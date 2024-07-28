## To run this Laravel app locally, follow these steps:

### Step 1: Clone the repository

```bash
git clone <repository_url>
```

### Step 2: Navigate to the project folder

```bash
cd "Support-Ticket-Management"
```

### Step 3: Install dependencies

```bash
composer install
```

### Step 4: Install frontend dependencies

```bash
npm install
```

### Step 5: Install dependencies

**Configure .env file with your database credentials**

```bash
cp .env.example .env
```

### Step 6: Generate application key:

```bash
php artisan key:generate
```

### Step 7: Run database migrations

```bash
php artisan migrate
```

### Step 8: Seed database (optional)

**Use this if you want some dummy data**

```bash
php artisan db:seed
```

### Step 9: Start the development server

```bash
php artisan serve
```

### Step 10: Build frontend assets

```bash
npm run dev
```

**or use `npm run build ` to build assets**

Now you should be able to access the Laravel app at localhost URL displayed on terminal.
