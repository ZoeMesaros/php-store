&#128087; The Vintage Dress &#128087;

An assignment in PHP to create a second-hand store management page using a database.

### Sellers

| id  | username    | first_name  | last_name   | email       |
| --- | ----------- | ----------- | ----------- | ----------- |
| int | varchar(32) | varchar(32) | varchar(32) | varchar(32) |

### Brands

| id  | name        |
| --- | ----------- |
| int | varchar(32) |

### Items

| id  | title       | color       | brand_id &#128273; | seller_id &#128273; | price | date_added | date_sold |
| --- | ----------- | ----------- | ------------------ | ------------------- | ----- | ---------- | --------- |
| int | varchar(50) | varchar(11) | int                | int                 | int   | date       | date      |

## Usage

1. Create a user account in a database program of choice and create a new database the details found in config.php.
2. Import store.sql to your newly created database.

## Features

Home page

- Shows you the statistics of all sales and economy section with details of the distribution of profits and taxes.

Sales page

- Shows you all dresses that are up for sale and allow you to add new ones. Tax is automatically calculated.
- Allows you to mark an item as sold.
- You can edit or fully remove an item.

Sold page

- Gives you an overview of all dresses that has been sold and the distribution of the profits.

Seller Page

- You can view all sellers and add new sellers to the page.
- You can edit or delete existing sellers in the list.
- Information page for every seller which consists of full details, number of sales and other relevant information.

Brands Page

- Shows all brands and lets you add new brands.
- You can edit or delete existing brands in the list.
