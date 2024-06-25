-- Ritardi nelle restituzioni.
CREATE OR REPLACE FUNCTION update_overdue_count()
RETURNS TRIGGER AS $$
BEGIN
    -- Verificar si la devolución es tarde
    IF NEW.actual_return_date > NEW.expected_return_date THEN
        -- Incrementar el contador de retrasos del lector
        UPDATE reader
        SET overdue_count = overdue_count + 1
        WHERE fiscal_code = (SELECT fiscal_code FROM loan WHERE copy_id = NEW.copy_id);
    END IF;

    -- Permitir la actualización de la fila
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_update_loan
AFTER UPDATE ON loan
FOR EACH ROW
EXECUTE FUNCTION update_overdue_count();



-- Proroga della durata di un prestito.
CREATE OR REPLACE FUNCTION check_loan_extension()
RETURNS TRIGGER AS $$
BEGIN
    -- Verificar si el préstamo está vencido al momento de la actualización usando la fecha original de devolución
    IF OLD.expected_return_date <= CURRENT_DATE THEN
        RAISE EXCEPTION 'Cannot extend the loan period for an overdue loan.';
    END IF;

    -- Permitir la actualización si no está vencido
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER before_update_loan
BEFORE UPDATE ON loan
FOR EACH ROW
WHEN (OLD.expected_return_date <> NEW.expected_return_date)
EXECUTE FUNCTION check_loan_extension();



-- Update status afet loaning
CREATE OR REPLACE FUNCTION update_copy_status()
RETURNS TRIGGER AS $$
BEGIN
    -- Actualizar el estado del ejemplar a 'loaned'
    UPDATE copy
    SET status = 'loaned'
    WHERE copy_id = NEW.copy_id;

    -- Permitir la inserción en la tabla loan
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

-- Crear el trigger
CREATE TRIGGER after_insert_loan
AFTER INSERT ON loan
FOR EACH ROW
EXECUTE FUNCTION update_copy_status();



-- Update status after returning copy
CREATE OR REPLACE FUNCTION update_copy_status_to_available()
RETURNS TRIGGER AS $$
BEGIN
    -- Actualizar el estado del ejemplar a 'available'
    UPDATE copy
    SET status = 'available'
    WHERE copy_id = NEW.copy_id;

    -- Permitir la actualización en la tabla loan
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_update_loan_return
AFTER UPDATE ON loan
FOR EACH ROW
WHEN (OLD.actual_return_date IS NULL AND NEW.actual_return_date IS NOT NULL)
EXECUTE FUNCTION update_copy_status_to_available();



--Statistiche per ogni sede.
CREATE OR REPLACE FUNCTION statistiche_per_ogni_sede(branch_id INTEGER)
RETURNS TABLE (
    total_copies BIGINT,
    total_isbns BIGINT,
    total_loans_in_progress BIGINT
) AS $$
BEGIN
    RETURN QUERY
    SELECT
        -- Número total de ejemplares gestionados por la sucursal
        (SELECT COUNT(*) FROM juan_barearojo.copy WHERE library_id = branch_id) AS total_copies,
        
        -- Número total de códigos ISBN gestionados por la sucursal
        (SELECT COUNT(DISTINCT isbn) FROM juan_barearojo.copy WHERE library_id = branch_id) AS total_isbns,
        
        -- Número total de préstamos en curso para los volúmenes mantenidos por la sucursal
        (SELECT COUNT(*) FROM juan_barearojo.copy WHERE library_id = branch_id AND status = 'loaned') AS total_loans_in_progress;
END;
$$ LANGUAGE plpgsql;


--Ritardi per ogni sede.
CREATE OR REPLACE FUNCTION ritardi_per_ogni_sede(branch_id INTEGER)
RETURNS TABLE (
    copy_id INTEGER,
    isbn VARCHAR(13),
    title VARCHAR(255),
    reader_fiscal_code VARCHAR(20),
    reader_name VARCHAR(200),
    expected_return_date DATE,
    actual_return_date DATE
) AS $$
BEGIN
    RETURN QUERY
    SELECT
        c.copy_id,
        c.isbn,
        b.title,
        r.fiscal_code AS reader_fiscal_code,
        CAST(CONCAT(r.first_name, ' ', r.last_name) AS VARCHAR(200)) AS reader_name,
        l.expected_return_date,
        l.actual_return_date
    FROM
        juan_barearojo.loan l
    JOIN
        juan_barearojo.copy c ON l.copy_id = c.copy_id
    JOIN
        juan_barearojo.book b ON c.isbn = b.isbn
    JOIN
        juan_barearojo.reader r ON l.fiscal_code = r.fiscal_code
    WHERE
        c.library_id = branch_id
        AND l.actual_return_date IS NULL
        AND l.expected_return_date < CURRENT_DATE;
END;
$$ LANGUAGE plpgsql;








