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