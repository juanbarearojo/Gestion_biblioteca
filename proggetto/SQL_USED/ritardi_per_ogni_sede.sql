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



