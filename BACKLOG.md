# Backlog

The agency's starter tickets.

**Tech lead:** create one Trello card per ticket (copy the title and the content), then assign each card to a team member.

**Everyone:** one card = one branch = one pull request. Put the pull request link on the card, and the card link in the pull request. See [CONTRIBUTING.md](CONTRIBUTING.md).

---

## 1. The mobile menu can't be used with the keyboard

**Type:** `fix` (branch `fix/…`)

On mobile, the menu opens with the ☰ button. But this button is a `<div>`: you can't reach it with the Tab key, and a screen reader doesn't know it's a button.

**To do:** replace `<div class="burger">` with a real button, and say whether it is open or closed.

✅ **You're done when:**
- on mobile, you reach the button with Tab and open the menu with Enter;
- the button has a name a screen reader can read (for example "Menu");
- the `aria-expanded` attribute is `true` when the menu is open, `false` when it is closed;
- the button looks the same as before.

---

## 2. The form message is not announced

**Type:** `fix` (branch `fix/…`)

After the form is sent, a success or error message appears. Someone using a screen reader doesn't hear it: the message shows up without being announced.

**To do:** make the message read out automatically when it appears.

✅ **You're done when:**
- the `.status` element has the right attribute (look up "aria-live");
- you can explain in one sentence what this attribute does.

---

## 3. The image alt texts are too poor

**Type:** `fix` (branch `fix/…`)

The alternative text (`alt`) describes an image for those who can't see it: screen readers, search engines, an image that doesn't load. Today they say "Website", "SEO", "Emma"… That's too vague.

**To do:** rewrite the `alt` of the 6 card images.

✅ **You're done when:**
- each `alt` describes what you see in the image, in a short sentence;
- no `alt` starts with "Image of" or "Picture of".

---

## 4. Add a preview for social networks

**Type:** `feat` (branch `feature/…`)

When you share the site link on LinkedIn, Slack or WhatsApp, a preview shows up (title, description, image). To control it, we use **Open Graph** tags in the `<head>`.

**To do:** add the main Open Graph tags.

✅ **You're done when:**
- the `<head>` contains at least `og:title`, `og:description`, `og:image` and `og:type`;
- you can tell where this information appears when the link is shared.

---

## 5. Respect the "reduce motion" setting

**Type:** `feat` (branch `feature/…`)

Some people turn off animations in their system (animations can make them feel sick). Yet the site animates the cards and the menu links on hover.

**To do:** turn these animations off when this setting is on.

✅ **You're done when:**
- with "reduce motion" on, the cards and links no longer move on hover;
- without this setting, nothing changes;
- you tested it with the DevTools (look up "emulate prefers-reduced-motion").

---

## 6. Clean up the last hard-coded spacings

**Type:** `chore` (branch `chore/…`)

The site's spacings come from three variables (`--space-section`, `--space-block`, `--space-text`, in `base.css`). A few hard-coded values remain, for example `8px`, `12px`, `16px` and `24px` in `cards.css`.

**To do:** find these values and replace them with variables, existing or new.

✅ **You're done when:**
- in `cards.css`, no `margin` or `padding` is written in pixels (shadows and the blue line can stay in pixels);
- the site looks exactly the same as before (compare screenshots before / after).

---

## 7. Text width on tablets

**Type:** `fix` (branch `fix/…`)

Between 500 and 900 pixels wide, the text blocks ("What we do", the team intro) are not as wide as the cards and the form. They are not aligned.

**To do:** make the text blocks as wide as the cards at these screen sizes.

✅ **You're done when:**
- at 768 px wide, texts, cards and form are the same width;
- on mobile and desktop, nothing changes.

---

## 8. Read the form fields by their name

**Type:** `chore` (branch `chore/…`)

In `scripts.js`, the form fields are read by their position: `event.target[0]`, `event.target[1]`, `event.target[2]`. If someone adds a field at the top of the form, everything shifts and the wrong values are sent.

**To do:** read each field by its `name` instead of its position.

✅ **You're done when:**
- `scripts.js` no longer uses `event.target[0]`, `[1]` or `[2]`;
- the form still sends the message;
- you can explain why it is safer (look up "form.elements" or "FormData").

---

## 9. Smooth scrolling with CSS

**Type:** `chore` (branch `chore/…`)

When you click a menu link, `scripts.js` scrolls smoothly to the section. CSS can do this on its own, with less code. Today the logo link doesn't scroll smoothly, and the address bar doesn't show the section (`#services`, ...).

**To do:** move the smooth scrolling to CSS, and keep in JS only what closes the mobile menu.

✅ **You're done when:**
- every link to a section scrolls smoothly, the logo included;
- the section title is not hidden under the fixed header;
- the address bar shows the section after a click;
- on mobile, the menu still closes after a click (look up "scroll-behavior" and "scroll-margin-top").

---

## 10. Help the browser fill in the form

**Type:** `feat` (branch `feature/…`)

The browser can fill in the name and email for the user, and block a message that is too long before it is even sent. `mail.php` refuses a name over 100 characters and a message over 5000, but the form doesn't say so.

**To do:** add the right attributes to the form fields.

✅ **You're done when:**
- the browser suggests your name and email when you click the fields (look up "autocomplete");
- you can't type more than 100 characters in the name, or 5000 in the message (look up "maxlength");
- the limits are the same as in `mail.php`.

---

## 11. Simplify the header width

**Type:** `chore` (branch `chore/…`)

In `header.css`, the fixed header gets its width from a calculation: `width: calc(100% - 2 * var(--gutter))`, because its padding is added to its width. It works, but if someone changes the padding and forgets the calculation, the header overflows or shrinks.

**To do:** give the header its full width without any calculation.

✅ **You're done when:**
- `header.css` no longer contains `calc(`;
- the header looks exactly the same as before, on desktop and on mobile, with the menu open and closed (compare screenshots before / after);
- you can explain why the calculation was needed (look up "box-sizing", or "left" and "right" on a fixed element).
