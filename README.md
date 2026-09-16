# Kuma Ramen — E-Commerce Website

Three-page website for a fictional Flagstaff ramen restaurant, built as the final project for ISM 330 (E-Commerce Strategy) at Northern Arizona University, Fall 2025. The Home and Contact pages are static HTML/CSS/JavaScript; the Menu page is generated server-side by PHP from a MySQL database.

## Pages

| Page | File | What it does |
|---|---|---|
| Home | `index.html` | Embedded Google Map of the location, promotional copy, and a shared nav/footer template |
| Contact | `contact.html` | Feedback form; JavaScript intercepts submit and shows a personalized confirmation popup, then resets the form |
| Menu | `menu.php` | Connects to MySQL, queries the `menu` table, and renders a card for each ramen with image, description, price, and rating |

Shared styling lives in `styles.css` (Google Fonts, responsive grid, back-to-top button).

## Database

`database.sql` creates the `kuma_ramen` database and a `menu` table (`RamenID`, `RamenName`, `price`, `rating`) and seeds it with five items. Run it in MySQL before loading the menu page:

```sql
SOURCE database.sql;
```

## Running locally

Requires PHP with the `mysqli` extension and a MySQL server.

1. Load the database with `database.sql`.
2. Set the connection variables in your environment (see `.env.example`): `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`. Credentials are read with `getenv()` and are not stored in the source.
3. Serve the folder with PHP:
   ```
   php -S localhost:8000
   ```
4. Open `http://localhost:8000/index.html`.

## Screenshots

GitHub cannot execute PHP, so the rendered Menu page is shown in `screenshots/`.

## Tools

HTML5 · CSS3 · JavaScript · PHP · MySQL
