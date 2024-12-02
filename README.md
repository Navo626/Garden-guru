<div align="center">

# GardenGURU - Your Personal Gardening Assistant

</div>

<p align="center">
  <img src="https://github.com/MigaraThiyunuwan/GardenGURU/blob/main-develop/images/logo.png" alt="Logo">
</p>


## Overview
Welcome to GardenGURU, your personal gardening assistant developed as a second-year university project at Uva Wellassa University of Sri Lanka.
GardenGURU is a comprehensive gardening website designed to assist users in managing their gardens. It integrates front-end technologies (HTML, CSS, JavaScript, Bootstrap) with back-end development in PHP, employing OOP principles. The website allows users to perform essential CRUD operations (Create, Read, Update, Delete) for managing plants, flowers, and more.

## Features

- **User Authentication:** Secure user authentication system for managing user accounts and sessions.
- **Plant Suggestions:** Considering several conditions such as soil, climate, moisture, temperature, sun exposure suggest the best plants.
- **Communication Forum:** Creating a forum for communication where users may discuss gardening-related topics and pose inquiries.
- **Advertisement:** Allowing employees or advertisers to publish advertisements for gardening-related products or services.
- **Blogs:** Including a blogging platform where users can create and post gardening-related articles.
- **Newsfeed:** Showing the most recent blog entries, gardening news, and updates in a newsfeed on the homepage.
- **Plant Selling:** Allowing users to buy plants and items linked to gardening over the website.
- **Reporting:** Providing a function for reporting that will produce statistics regarding user activity, sales, and forum interaction.
- **Responsive Design:** A user-friendly interface that adapts gracefully to different screen sizes.

## Tech Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP (OOP principles)
- **Server:** XAMPP

## Getting Started

### Prerequisites

Make sure you have the following installed on your machine:

- XAMPP

### Getting Started with Development

Follow these steps to set up the project for local development:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/MigaraThiyunuwan/GardenGURU.git

2. **Navigate to the htdocs directory:**
   ```bash
   cd xampp/htdocs

3. **Copy the project files into the htdocs directory.**

4. **Start the XAMPP server.**

Now you can access the development version of GardenGURU at ***http://localhost/GardenGURU***.

## Database Setup

1. **Start the XAMPP server:** Start the Apache and MySQL modules from the XAMPP control panel.

2. **Open phpMyAdmin:** Open your web browser and navigate to ***http://localhost/phpmyadmin***.

3. **Create a new database:** Click on the `Databases` tab at the top of the phpMyAdmin page. Enter the database name `gardenguru` in the `Create database` field and click `Create`.

4. **Import the .sql file:**

   - Select the `gardenguru` database you just created from the left sidebar.
   - Click on the `Import` tab at the top of the page.
   - Click `Choose File` and navigate to the 'SQL' folder in the GardenGURU project directory. Select the .sql file and click `Open`.
   - Click `Go` at the bottom of the page to start the import process.

Your `gardenguru` database should now be set up with the tables and data defined in the .sql file.

## View
### Accessing the Live Demo
Visit our Youtube channel to experience GardenGURU without setting up locally: [Youtube Demo](https://youtu.be/9VovBPv2RVs)
