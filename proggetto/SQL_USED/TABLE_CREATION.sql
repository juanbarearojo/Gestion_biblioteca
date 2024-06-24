-- Table LIBRARY
CREATE TABLE LIBRARY (
    library_id INT PRIMARY KEY,
    city VARCHAR(100),
    address VARCHAR(255) NOT NULL
);

-- Table BOOK
CREATE TABLE BOOK (
    isbn VARCHAR(13) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    summary TEXT,
    publisher VARCHAR(255) NOT NULL
);

-- Table AUTHOR
CREATE TABLE AUTHOR (
    author_id INT PRIMARY KEY NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birth_date DATE DEFAULT CURRENT_TIMESTAMP,
    death_date DATE DEFAULT CURRENT_TIMESTAMP,
    biography TEXT
);

-- Table WRITTEN_BY (Relationship between BOOK and AUTHOR)
CREATE TABLE WRITTEN_BY (
    isbn VARCHAR(13),
    author_id INT,
    PRIMARY KEY (isbn, author_id),
    FOREIGN KEY (isbn) REFERENCES BOOK(isbn) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES AUTHOR(author_id) ON DELETE CASCADE
);

-- Table COPY
CREATE TABLE COPY (
    copy_id INT PRIMARY KEY DEFAULT nextval('copy_copy_id_seq'::regclass),
    isbn VARCHAR(13), 
    library_id INT,
    status VARCHAR(10) DEFAULT "available",
    FOREIGN KEY (isbn) REFERENCES BOOK(isbn) ON DELETE CASCADE,
    FOREIGN KEY (library_id) REFERENCES LIBRARY(library_id) ON DELETE CASCADE,
    CHECK (status IN ('available', 'loaned'))
);

-- Table READER
CREATE TABLE READER (
    fiscal_code VARCHAR(20) PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    services VARCHAR(10),
    overdue_count INT DEFAULT 0,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    CHECK (services IN ('basic', 'premium'))
);

-- Table BIBLIOTECARIO (Librarian who works in a library)
CREATE TABLE BIBLIOTECARIO (
    librarian_id INT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    library_id INT,
    FOREIGN KEY (library_id) REFERENCES LIBRARY(library_id) ON DELETE SET NULL
);

-- Table LOAN
CREATE TABLE LOAN (
    copy_id INT,
    fiscal_code VARCHAR(20),
    loan_date DATE DEFAULT CURRENT_TIMESTAMP,
    expected_return_date DATE DEFAULT CURRENT_DATE + INTERVAL '10 days',
    actual_return_date DATE,
    PRIMARY KEY(copy_id, fiscal_code,loan_date),
    FOREIGN KEY (copy_id) REFERENCES COPY(copy_id) ON DELETE CASCADE,
    FOREIGN KEY (fiscal_code) REFERENCES READER(fiscal_code) ON DELETE CASCADE
);
