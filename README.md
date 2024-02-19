Manage Petro
====================

Welcome to the Fuel Delivery System! This system helps manage the delivery of fuel to customers, track truck availability, and manage client information.

Features
--------

*   **Dashboard**: View key statistics and summaries of fuel delivery operations.
*   **Client Management**: Manage client information, including contact details and delivery preferences.
*   **Truck Management**: Add, edit, and remove trucks used for fuel delivery.
*   **Order Management**: Create and manage fuel delivery orders for clients.
*   **Pipeline Actions**: Track the progress of orders through various stages, such as "Ordered", "", and "Delivered".
*   **Invoice Generation**: Automatically generate invoices for completed fuel delivery orders.

Getting Started
---------------

To get started with the Fuel Delivery System, follow these steps:

1.  **Installation**:
    
    *   Clone the repository to your local machine.
    *   Run `composer install` and `npm install` to install dependencies.
    *   Configure your `.env` file with database and other settings.
    *   Run `php artisan migrate` to migrate the database schema.
    *   Run `npm run dev` to build vite for production.
    *   Run `artisan db:seed --class=PipelineSeeder` to seed the Pipeline and PipelineAction models
2.  **Usage**:
    
    *   Access the application in your web browser.
    *   Navigate through the dashboard and menu items to manage trucks, clients, orders, and invoices.
    *   Utilize the various features to streamline fuel delivery operations.

Demo Credentials:
------------
Address: https://aviato.ir
Username: ****************
Password: ****************

Contributing
------------

Contributions to the Fuel Delivery System are welcome! If you encounter any issues or have ideas for improvements, please open an issue or submit a pull request on GitHub.

License
-------

This project is licensed under the MIT License.