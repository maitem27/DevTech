# Contributing

## Ground rules

- The `main` branch is protected: nobody pushes to it directly. Everything goes through a pull request.
- One branch per ticket, created from an up-to-date `main`.
- One pull request per ticket, reviewed and approved by the tech lead before it is merged.

## Naming your branch

```
feature/<topic>   a new feature        (feature/team-card-ana)
fix/<topic>       a fix                (fix/contact-form-email)
chore/<topic>     maintenance, setup   (chore/docker-mailpit)
```

Lowercase, with hyphens, and a topic that says what it is about.

## Writing your commits

We follow [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/):

```
feat: add team card for Ana
fix: validate email in contact form
style: align service cards on mobile
docs: explain how to run the project
chore: add Mailpit to docker compose
```

One commit per step, with a message that says what changes.

## The life of a ticket

```bash
git switch main
git pull
git switch -c feature/<topic>

# ... work, commits ...

git push -u origin feature/<topic>
```

Then, on GitHub:

1. Open a pull request to `main` and fill in the template.
2. If the tech lead asks for changes, fix them: just push new commits to the same branch.
3. Once the pull request is approved and merged, delete the branch, then update your local `main` (`git switch main`, then `git pull`).

## Running the project

See the [README](README.md).
