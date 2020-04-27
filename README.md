<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## Status

Note:
Connection between views, controller, models been made and checked using all possible tables I can think of now. Will further work on it definitely. Only initial functionality is checked like fetching from database tables, company-job relationship (1-m, m-1), front page functionality checked- visitor can get the idea of openings but can't apply without registration. Also 'logically' put, after login, only seeker can apply, and not the employer. Auth was used for this. All the migrations and other things were only tested without logging in. Functionality after loggin in is not available now but will soon be available, though initial pages are ready to be connected with more pages. Also, Laravel database>factories were heavily used for fake data creation and use. One can do the same with db:seed.

*exported SQL file shared (along with database details from .env file). One can import.
*Employer Registration task still needs to be done.
_Thanks_
-Monika


## Initial tasks:
-home page [which also displays **features]
(AssignedTo:Priti; Only 'navbar' for now)

-registration/login for separating employers (AssignedTo: Akshay, _also flowchart& candidate pages_ )

-login/reg for hiring employers (AssignedTo: Monika, _Also setup all migration, model, controller, view, pages, working on initial logic, github push_)

-login/reg for job seekers (AssignedTo: Akshay)

-login/reg for volunteers (AssignedTo: Priti; _Also gathering relevant data from ngo-like sites & incorporating the same_)


Other pages (and more to be added later):
-dashboard 
-profile/CV upload page for separating employer (def: details of people who got fired)
-search consolidated profile for hiring employers (candidates search)


Some points from earlier zoom meeting including sharing of screenshots:
"registration & login system, candidate profile including Resume& displaying the same, display job seeker resume, a job creation form, employer can view applicants, company listing, notice period, job filter, filter job based on category, front page search as in internshala.. etc."

