# MentorHUB

Application was dockerized only for dev mode.

## Install backend
Infrastructure following the DDD(ish) way of organizing the application.

1.```cd backend```

2.```cp .env.example .env```

3.```./dc.sh build``` ( docker compose buid )

4.```./dc.sh up -d``` ( docker compose up -d )

5.```./install.sh``` ( composer install, migrate and seed database )

Backend URL: ```http://localhost:8001/```

### Install frontend
Uses react tanstack query, axios

1.```cd frontend```

2.```./dc.sh build```

3.```./dc.sh up -d```

Frontend URl: ```http://localhost:3000/```
