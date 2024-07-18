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
WHEN (OLD.expected_return_date <> NEW.expected_return_date) -- se activa en el cambio comprobar que es <>
EXECUTE FUNCTION check_loan_extension();