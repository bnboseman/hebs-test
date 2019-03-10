#  hebsdigital PHP Test Task

## Objective
Create a Laravel application that demonstrates your full stack abilities. The application should:
- Contain an API Resource controller: PersonController...Only the Index and Show methods need to be
implemented

- Uses Faker to return collections or singular JSON representations of a Person...with at least the following
fields:
  1. Id (auto-incrementing integer)
  2. First Name (faker)
  3. Last Name (faker)
  4. Address (w. city, state) (faker)
  5. Job Title (faker)
  6. Posts
    - Data fetched from the following fake API using Guzzle: https://jsonplaceholder.typicode.com/posts
    - Posts should be an array/collection. Each user should have an ID (first in the array is user ID 1,
second user is ID 2, and so on..). All Posts for the corresponding user should be contained in the
collection.

- Create a quote route (`/quote`) which pulls one record from https://api.kanye.rest/ and returns the quote as
JSON.

- Uses Vue.JS or ReactJS to have a frontend that consumes the API to read and display the API response data
in a clear and visually appealing way. The UI should make a call to the index action of the PersonController to
fetch a list of people, and render all data returned in the response.
  1. Make a call to `/quote` to fetch and render the quote as an `<h1>` somewhere on the page.
  2. Please use CSS (with or without a library like Bootstrap) to make the page presentable.

**Note:** When calling the index action of the controller, the user should be able to provide a "limit" parameter to
control how many results are returned in the collection. In addition, no api authentication is provided to call this
API. If the limit is larger than 100, the API should:
  1. Return a JSON response like 
    ```
      {“error”: {“code”: 400, “message”: “The maximum limit is 100” }}
    ```
  2. Return HTTP status code 400

**BONUS:** Implement some basic unit tests that interact with the HTTP endpoint (i.e. to QA the status code 400
when limit is greater than 100).
