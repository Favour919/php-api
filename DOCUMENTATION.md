# API Documentation

This documentation provides an overview of the endpoints available for interfacing with the "Person" resource and their standard request and response formats. It also includes sample usage, known limitations, and instructions for setting up and deploying the API.

## Base URL

The base URL for all endpoints is `http://127.0.0.1:5501/customers/`.

## Endpoints

### Add a new person

**Endpoint:** `POST /api`

**Request:**

```http
POST /api
Content-Type: application/json

{
  "name": "John Doe"
}
```

**Response:**

```http
Status: 200 OK
Content-Type: application/json

{
  "id": 1,
  "name": "John Doe"
}
```

### Fetching details of a person

**Endpoint:** `GET /api/{id}`

**Request:**

```http
GET /api/{id}
```

**Response:**

```http
Status: 200 OK
Content-Type: application/json

{
  "id": 1,
  "name": "John Doe"
}
```

### Updating details of a person

**Endpoint:** `PUT /api/{id}`

**Request:**

```http
PUT /api/{id}
Content-Type: application/json

{
  "name": "Updated User"
}
```

**Response:**

```http
Status: 200 OK
Content-Type: application/json

{
  "id": 1,
  "name": "Updated User"
}
```

### Deleting a person

**Endpoint:** `DELETE /api/{id}`

**Request:**

```http
DELETE /api/{id}
```

**Response:**

```http
Status: 204 No Content
```

## Error Handling

In case of an error, the API returns the following response:

```http
Status: {Error Code}
Content-Type: application/json

{
    "error": "Error Message"
}
```

## Sample Usage

Here are some examples of how you can use the API:

1. Adding a new person:
   - Send a `POST` request to `/api` with the person's name in the request body.
   - The API will respond with the person's details, including the assigned ID.

2. Fetching details of a person:
   - Send a `GET` request to `/api/{id}` with the person's ID in the URL.
   - The API will respond with the person's details.

3. Updating details of a person:
   - Send a `PUT` request to `/api/{id}` with the person's ID in the URL and the updated name in the request body.
   - The API will respond with the updated person's details.

4. Deleting a person:
   - Send a `DELETE` request to `/api/{id}` with the person's ID in the URL.
   - The API will respond with no content if the deletion is successful.

## Limitations and Assumptions

Please note the following limitations and assumptions of the API:

- The API assumes that the ID provided in the URL for fetching, updating, or deleting a person exists in the database. If the ID is invalid, an error will be returned.
- The API does not support bulk operations for creating, updating, or deleting multiple persons at once.
- The API does not implement any authentication or authorization mechanisms. It assumes unrestricted access to the endpoints.

## Setup and Deployment

To set up and deploy the API locally or on a server, follow these instructions:

1. Clone the project repository from GitHub.
2. Install the required dependencies using Composer.
3. Run the database migrations to create the necessary tables.
4. Start the PHP development server.
5. The API will be accessible at `http://127.0.0.1:5501/customers/` or the specified URL.
