# Web2Risk agency one page website solution example

## Quick start

- Optional: copy *.env.example* to *.env* to change the email addresses used by the contact form
- Run the following command:

```bash
docker compose up --build -d
```
- Go to http://localhost:9000 to see the website
- Go to http://localhost:8025 to see the emails sent by the contact form (Mailpit: no email is really sent)
- Run the following command to shutdown properly containers
```bash
docker compose down
```

Without Docker, the pages can be opened with any local server (e.g. Live Server), but the contact form needs PHP.

## Send real emails (optional)

By default, emails are caught by Mailpit. To send them through a real SMTP server:

- Copy *.msmtprc.example* to *.msmtprc* and fill in your SMTP server and account
- Copy *docker-compose.override.yaml.example* to *docker-compose.override.yaml*
- In *.env*, set `CONTACT_TO` to your real inbox and `CONTACT_FROM` to the address of the SMTP account
- Run `docker compose up -d` again

To go back to Mailpit, remove *docker-compose.override.yaml* and run `docker compose up -d` again. The three files are ignored by git: never commit them, they contain your credentials.

## Code sample

**Application files to consider regarding the application project are:**
- index.html
- mail.php
- assets/js/scripts.js
- assets/css/ (one stylesheet per component)
- BACKLOG.md (starter tickets for the agency)

**Particular attention points:**
- A clear semanticaly exact and minimalist HTML structure, with just what's needed.
- As a good practice, JS script are embedded at the bottom of the document.
- Usage of [fetch](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API) to exchange some *application/json* with the PHP script.
- JS events handler are attached via [addEventListener](https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener) vanilla function when the [DOMContentLoaded](https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event) event is fired.
- Usage of [event.preventDefault](https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault) to cancel the native behavior of the submit button.
- The CSS sheet is implementing a [reset CSS](https://meyerweb.com/eric/tools/css/reset/) before to start.
- Usage of the [CSS Grid Layout API](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_grid_layout) to display some elements.
  
**To go further with this integration:**
- Improve the design quality
- Use [picture](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture) tag to manage image medias
- Use [PHPMailer](https://github.com/PHPMailer/PHPMailer) to send emails
- Minify JS / CSS files
- ...

## Links

- [Docker](https://www.docker.com/)
- [Use containers for PHP development](https://docs.docker.com/guides/php/develop/)
- [Mailpit](https://mailpit.axllent.org/)