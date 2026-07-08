# Jewellery E-Commerce App (Dockerized)

PHP-based jewellery e-commerce web application, containerized with Docker and connected to a MySQL database via a custom Docker bridge network. Deployed on AWS EC2.

## Tech Stack
- PHP
- MySQL
- Docker & Docker Compose (agar use kiya ho to)

## Architecture
- `jewellery-app` → PHP application container (port 8082)
- `jewellery-db` → MySQL database container
- Both connected via custom Docker bridge network: `jewellery-net`

## How to Run

**1. Create Docker network**
\`\`\`bash
docker network create jewellery-net
\`\`\`

**2. Run MySQL container**
\`\`\`bash
docker run -d --name jewellery-db \\
  --network jewellery-net \\
  -e MYSQL_ROOT_PASSWORD=yourpassword \\
  -e MYSQL_DATABASE=jewellery_db \\
  mysql:latest
\`\`\`

**3. Build & run PHP app container**
\`\`\`bash
docker build -t jewellery-app .
docker run -d --name jewellery-app \\
  --network jewellery-net \\
  -p 8082:80 \\
  jewellery-app
\`\`\`

App will be available at: `http://<your-server-ip>:8082`

## Project Structure
