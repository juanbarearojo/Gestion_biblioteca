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












