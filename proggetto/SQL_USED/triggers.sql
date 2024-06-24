--Blocco prestiti a lettori ritardatari.
CREATE OR REPLACE FUNCTION check_overdue_count()
RETURNS TRIGGER AS $$
BEGIN
    -- Check the overdue_count of the reader trying to borrow a book
    IF (SELECT overdue_count FROM reader WHERE fiscal_code = NEW.fiscal_code) >= 5 THEN
        -- If the reader has 5 or more overdue returns, raise an exception
        RAISE EXCEPTION 'Cannot lend to a reader with 5 or more overdue returns.';
    END IF;

    -- If the reader has less than 5 overdue returns, allow the insert
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER before_insert_loan
BEFORE INSERT ON loan
FOR EACH ROW
EXECUTE FUNCTION check_overdue_count();



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

-- Crear el trigger revisado
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

-- Crear el trigger
CREATE TRIGGER after_update_loan_return
AFTER UPDATE ON loan
FOR EACH ROW
WHEN (OLD.actual_return_date IS NULL AND NEW.actual_return_date IS NOT NULL)
EXECUTE FUNCTION update_copy_status_to_available();


