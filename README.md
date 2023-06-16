&#128087; The Vintage Dress &#128087;

This was a PHP school assignment to create a second-hand store management page using a database.

## Description

A company sell second-hand dresses for a fee and ask for a management system to be created to help manage
the high volume of sales.

This application is only an admin management page but can easily be built into a user-buyer-seller experice.

A seller turns in one or more items of clothing to the company and a seller account is created where details is registered
and a username is chosen.

The company will register all new items and price them based on their value.

When an item sells, the company manages the sale with the buyer together with shipping arrangements.
The profits is set to be 60% for the seller and 40% for the company. All profits and taxes will be automatically calculated.

The database constists of these tables:

### Sellers

| id (PK) | username    | first_name  | last_name   | email       | phone       |
| ------- | ----------- | ----------- | ----------- | ----------- | ----------- |
| int     | varchar(32) | varchar(32) | varchar(32) | varchar(32) | varchar(15) |

### Brands

| id (PK) | name        |
| ------- | ----------- |
| int     | varchar(32) |

### Items

| id  | title       | color       | brandID (FK) &#128273; | sellerID (FK) &#128273; | item_desc    | price | date_added | date_sold |
| --- | ----------- | ----------- | ---------------------- | ----------------------- | ------------ | ----- | ---------- | --------- |
| int | varchar(50) | varchar(11) | int                    | int                     | varchar(250) | int   | date       | date      |

## Usage

1. Create a user account in an SQL program of your choice and create a new database "store" using username and password found in partials/config.php.
2. Import store.sql to your newly created database.

## Features

# Home page

- Shows you the statistics of all sales and economy section with details of the distribution of profits and taxes.

# Sales page

- Shows you all dresses that are up for sale and allow you to add new ones. Tax is automatically calculated.
- Allows you to mark an item as sold.
- You can edit or fully remove an item.

# Sold page

- Gives you an overview of all dresses that has been sold with sell date, seller information and economy.

# Sellers Page

- You can view all sellers and add new ones to the page.
- You can edit or delete existing sellers in the list.
- Information page for every seller which consists of full details, number of sales and other relevant information.

# Brands Page

- Shows all brands and lets you add new ones.
- You can edit or delete existing brands in the list.

# Future implementations:

- Buyer page to display all dresses with pictures.
- Buyer account registration.
