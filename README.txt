To setup the database for this application you have to :
- php artisan migrate
- php artisan db:seed

There is 3 seeders: Roles Seeder, Departments Seeder, and Genders Seeder.

I've used Laravel, Livewire, and Tailwind for this application.

To run the application you have to :
- php artisan serve
- npm run dev

Once you have done these steps, you will be able to login with these credentials for admin:
email: admin@admin.com
password: 12345678

and for a normal user:
email: user@user.com
password: 12345678

For the 5th feature "Admin Existence", I've made a Users Datatable containing all the users that has role other than admin,
the admin has the ability to add, edit, delete the users and their profiles in this datatable, also I've made an Admin Middleware,
to the dashboard and audit trails pages.

For the 7th feature "Audit Trails", I've made a User Observer that track the changes for the user profile when updating, and
storing the data in the db, plus there is a datatable that shows all the changes made by the users, and to be able to show the
data I've made a Morph To Many relationship from the AuditTrail Model to be able to show the old value and the new value of the
changes done since the gender, the department, and the role are stored as foreign id inside the audit_trails table in the db.

For the 8th feature "Access Control", I've defined a gate inside the AuthServiceProvider to check if the auth user and the targeted user
are the same, or if the logged in user is an admin, then I have used it inside the livewire components.

Thank you.
