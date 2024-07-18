-- Ritardi nelle restituzioni.
CREATE OR REPLACE FUNCTION update_overdue_count()
RETURNS TRIGGER AS $$
BEGIN
    -- Verificar si la devolución es tarde
    IF NEW.actual_return_date > NEW.expected_return_date THEN -- Se puede poner tnaot OLD como New en este caso aunque old sería mas recomendado
        -- Incrementar el contador de retrasos del lector
        UPDATE reader
        SET overdue_count = overdue_count + 1
        WHERE fiscal_code = (SELECT fiscal_code FROM loan WHERE copy_id = NEW.copy_id); -- podria cambiarse a NEW.fiscal_code
    END IF;

    -- Permitir la actualización de la fila
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE TRIGGER after_update_loan
AFTER UPDATE ON loan
FOR EACH ROW
EXECUTE FUNCTION update_overdue_count();
