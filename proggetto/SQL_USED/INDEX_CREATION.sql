-- Indexes for performance improvement
CREATE INDEX idx_library_city ON LIBRARY(city);
CREATE INDEX idx_book_title ON BOOK(title);
CREATE INDEX idx_author_last_name ON AUTHOR(last_name);
CREATE INDEX idx_reader_last_name ON READER(last_name);
CREATE INDEX idx_copy_status ON COPY(status);
CREATE INDEX idx_loan_loan_date ON LOAN(loan_date);