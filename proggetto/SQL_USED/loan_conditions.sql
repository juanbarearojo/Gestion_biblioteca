-- Función para chequear el máximo de préstamos
CREATE OR REPLACE FUNCTION check_max_loans(fiscal_code_given TEXT)
RETURNS VOID AS $$
DECLARE
    loan_count INTEGER;
    max_loans INTEGER;
BEGIN
    -- Obtener el número actual de préstamos del lector
    SELECT COUNT(*)
    INTO loan_count
    FROM loan
    WHERE fiscal_code = fiscal_code_given AND actual_return_date IS NULL;

    -- Determinar el máximo de préstamos permitidos según la categoría del lector
    IF (SELECT services FROM reader WHERE fiscal_code = fiscal_code_given) = 'basic' THEN
        max_loans := 3;
    ELSE
        max_loans := 5;
    END IF;

    -- Verificar si el lector ha alcanzado el número máximo de préstamos permitidos
    IF loan_count >= max_loans THEN
        RAISE EXCEPTION 'The reader has reached the maximum number of loans.';
    END IF;
END;
$$ LANGUAGE plpgsql;

-- Función para chequear el número de préstamos vencidos
CREATE OR REPLACE FUNCTION check_overdue_count(fiscal_code_given TEXT)
RETURNS VOID AS $$
BEGIN
    -- Chequear el overdue_count del lector que intenta tomar prestado un libro
    IF (SELECT overdue_count FROM reader WHERE fiscal_code = fiscal_code_given) >= 5 THEN
        -- Si el lector tiene 5 o más préstamos vencidos, lanzar una excepción
        RAISE EXCEPTION 'Cannot lend to a reader with 5 or more overdue returns.';
    END IF;
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION check_loan_conditions()
RETURNS TRIGGER AS $$
BEGIN
    -- Llamar a la sub-función para chequear el máximo de préstamos
    PERFORM check_max_loans(NEW.fiscal_code);
    
    -- Llamar a la sub-función para chequear el número de préstamos vencidos
    PERFORM check_overdue_count(NEW.fiscal_code);
    
    -- Si ambos chequeos pasan, permitir la inserción
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;


CREATE TRIGGER before_insert_loan
BEFORE INSERT ON loan
FOR EACH ROW
EXECUTE FUNCTION check_loan_conditions();
