# Library Management Project 📚

## Project Description
This project aims to develop a database application for managing a library distributed across different locations. The application allows registered readers to view catalog information and request book loans, while librarians can manage books and locations, as well as register returns.

## Main Features
1. **Readers**:
   - View information about the library's catalog.
   - Request book loans by specifying the title or ISBN.
   - Specify a preferred location for the loan.

2. **Librarians**:
   - Manage information about readers and books.
   - Insert and manage locations and books.
   - Extend loan durations.
   - Remove readers' overdue penalties.

3. **Library Management**:
   - The library is distributed across different locations, identified by a unique code.
   - Maintains detailed information about books, including ISBN, title, authors, summary, and publisher.
   - Controls the availability of books and manages them by locations.
   - Loan restrictions based on the number of overdue returns and the maximum number of volumes loaned.

## Technologies Used
- **Database**: PostgreSQL, PL/pgSQL
- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Admin Tool**: phpPgAdmin

## Application Usage
### Access to the Application
- **Librarians**: Access the application using a username and password, can change their password, and manage user accounts.
- **Readers**: Access the application using a username and password, can change their password, and request book loans.

### Features
- **Request Loans**: Readers can specify the ISBN or title of a book and request its loan. They can indicate a preferred location.
- **Manage Books and Locations**: Librarians can add new books, remove books no longer maintained, and manage the different library locations.

## Application Access
The developed application is accessible online via the following URL:
[https://studenti.di.unimi.it/juan.barearojo@studenti.unimi.it](https://studenti.di.unimi.it/juan.barearojo@studenti.unimi.it) 🌐

