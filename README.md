# Event platform for people who have no fb 💪

## Version 1.0 🌱 --> ✅

1. Option to log in ✓
2. Create events when logged in. ✓
3. Home page with all the (public) events. ✓
4. Display your events in your personal page. ✓
5. Edit/delete your event. ✓
6. Scraping package:
    - find the right package + how to use it. ✓
    - scrape events from cinema's. (add it to the other events table + new column:'type') ✓
    - translate it into TB table (weekly) without creating doubles. ✓
    - scraping happens only once a week or something like that. (HOW?) ✓
    - print scraped events together with other events onto the home page. ✓

## Version 2.0 (COMING SOON) 🌼
As a user:
1. Save events you like and find them back on your personal page.
    - Users column: saves (an array with event_id's?). ✓
    - When clicked on save -> add to array ✓
    - ... & the other way around: unsave ✓ 
    - Display saved events on personal page. ✓
    - When a event is deleted, remove it also from the saves ✓
2. Make use of components and stuff to make the pages more dynamic...
    - in account.blade: make saves be events and events be yourevents so that i can use a component for the events dipslayed in the home page and in the saved events (same layout).
3. Some basic styling

EXTRA: Add a manifesto to the website.

### Version 2.1 
1. Refactoring
2. Make past events delete and be stored in an archive table (with less information for example)

## Version 3.0 (FUTURE UPDATES) 🌳
As a user: 
1. Possibility to make private events
2. ... and invite other users.
3. See events from people who invited you.


## OTHER IDEAS / POSSIBLE UPGRADES
- Eventform with possibility to change the organisation name.
- show events in chronological order and delete/archive(?) old events.
