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