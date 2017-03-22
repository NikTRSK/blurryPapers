# 310-Project2
Super awesome app for project 2 (Working title)

## Commit rules
1. ***Do not*** commit directly to the master branch.
2. Have a branch for every feature we implement. Potentially branch out for every task.
3. Once you feel confident with the feature merge it with the master branch (we’ll go over this for anyone not familiar with it)

### Commiting and Commit Messages
1. Commit often since they will be looking at pacing.
2. As mentioned above never commit to master
3. Format of the commit messages should be as follows:
	`<commit type>: <message>; <partner1>, <partner2>`

&nbsp;&nbsp;**commit type:**

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**T** - Test

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**F** - Feature/Function/Functionality

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**B** - Bugfix of existing code

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**M** - Merge request into branch

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**D** - (no, no it’s not the D) Any sort of documentation

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**C** - Cleanup. Anything that doesn’t change functionality (removing commented out code, adding comments, etc)

&nbsp;&nbsp;**message:** description of what you have done

&nbsp;&nbsp;**partner1, partner2:** optional. If you pair programming

###### Ex commit message:

`T: implemented tests for xyz; Jean, Jin`

## Get started (Setup & Run Dev server)

* First install all the necessary dependencies.
```
> npm install
```

* Run an initial webpack build
```
> webpack
```

* Start the development server (changes will now update live in browser)
```
> npm run start
```

To see the results of your hard work go to: [http://localhost:3000/](http://localhost:3000/)
* Yes even Firefox, Jean

## To Run Tests
* Stayed tuned folks


## Folder Structure
```
dev // All the developement happens in here
--js // JavaScript files here
----actions // Things that happen (BUTTON_CLICKED etc)
----components // Anything used for displaying stuff
----containers // A smart component (aware of the state/data changes)
----reducers // Reducers take in actions and update part of application state.
----index.js // Entry point for the App
--css // Styles here. Let's keep this as SASS
src // This is where the project is built
--js // Generally you don't need to touch this
----bundle.min.js // The packaged app (by webpack)
--index.js // Entry point for bundle.min.js
tests // All unit tests and blackbox tests go here
```