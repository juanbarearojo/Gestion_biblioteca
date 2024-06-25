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