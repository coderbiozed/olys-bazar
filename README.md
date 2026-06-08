# Olys Bazar

Laravel 9 e-commerce application (Olys Bazar).

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
php artisan serve
```

## Host on GitHub (code)

GitHub stores your code for free. It does **not** run PHP/Laravel apps directly.

### 1. Create a GitHub repository

1. Go to [github.com/new](https://github.com/new)
2. Name it `olys-bazar` (or any name you prefer)
3. Leave it **empty** (no README, no .gitignore)
4. Click **Create repository**

### 2. Push this project

```bash
git init
git add .
git commit -m "Initial commit: Olys Bazar Laravel e-commerce"
git branch -M main
git remote add origin https://github.com/YOUR_USERNAME/olys-bazar.git
git push -u origin main
```

Replace `YOUR_USERNAME` with your GitHub username.

## Free live hosting (deploy from GitHub)

Use a free platform that connects to your GitHub repo:

| Platform | Free tier | Notes |
|----------|-----------|-------|
| [Render](https://render.com) | Yes | Best fit; `render.yaml` included |
| [Railway](https://railway.app) | Limited credits | Easy GitHub deploy |
| [Fly.io](https://fly.io) | Small free allowance | Uses `Dockerfile` included |

### Deploy on Render (recommended)

1. Push the project to GitHub (steps above)
2. Sign up at [render.com](https://render.com) with your GitHub account
3. Click **New** → **Blueprint**
4. Connect your `olys-bazar` repository
5. Render reads `render.yaml` and creates a Docker web service + free PostgreSQL database (the app listens on Render's `$PORT`)
6. Set `APP_URL` in Render to your live URL (e.g. `https://olys-bazar.onrender.com`)
7. Optionally set `STRIPE_KEY` and `STRIPE_SECRET` if you use Stripe payments
8. Migrations run automatically on deploy; to seed data, open the Render shell and run:

```bash
php artisan db:seed
```

### Environment variables on production

Never commit `.env`. Set these on your host:

- `APP_KEY` — generate with `php artisan key:generate --show`
- `APP_URL` — your live site URL
- `DB_*` — database credentials from your host
- Stripe keys — if you use payments (move keys out of blade templates into `.env`)

## License

MIT
