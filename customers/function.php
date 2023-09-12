<?php

    require '../inc/dbcon.php';

    function getCustomer($customerParams){

        global $conn;

        if($customerParams['id'] == null){

            return error422("Enter customer id");

        }

        $customerId = mysqli_real_escape_string($conn, $customerParams['id']);

        $query = "SELECT * FROM customers WHERE id='$customerId' LIMIT 1  ";
        $res = mysqli_query($conn, $query);

        if($res){

            if (mysqli_num_rows($res) == 1) {
                
                $res = mysqli_fetch_assoc($res);

                $data = [

                    'status' => 200,
                    'message' => 'Customer Fetch Successfully',
                    'data' => $res
            
                ];
                
                header("HTTP/1.0 200 Ok");
                return json_encode($data, JSON_PRETTY_PRINT);


            }else 
            {
                $data = [

                    'status' => 404,
                    'message' => 'No Customer Found'
            
                ];
                
                header("HTTP/1.0 404 No Customer Found");
                return json_encode($data);
    
            }

            $data = [

                'status' => 201,
                'message' => 'Customer Created Successfully'
        
            ];
            
            header("HTTP/1.0 201 Created");
            return json_encode($data, JSON_PRETTY_PRINT);

        }else {

            $data = [

                'status' => 500,
                'message' => 'Internal Server Error'
        
            ];
            
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);
            
        }

    }

    function getCustomerList(){

        global $conn;

        $query = "SELECT * FROM customers";

        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            
            if (mysqli_num_rows($query_run) > 0) {
                
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

                $data = [

                    'status' => 200,
                    'message' => 'Customer List Fetch Successfully',
                    'data' => $res
            
                ];
                
                header("HTTP/1.0 200 Customer List Fetch Successfully");
                return json_encode($data, JSON_PRETTY_PRINT);


            }else 
            {
                $data = [

                    'status' => 404,
                    'message' => 'No Customer Found'
            
                ];
                
                header("HTTP/1.0 404 No Customer Found");
                return json_encode($data);
    
            }


        }
        else
        {

            $data = [

                'status' => 500,
                'message' => 'Internal Server Error'
        
            ];
            
            header("HTTP/1.0 500 Internal Server Error");
            return json_encode($data);

        }


    }

    function error422($message){

        $data = [

            'status' => 422,
            'message' =>  $message
    
        ];
        
        header("HTTP/1.0 422 Unprocessable Entity");
        echo json_encode($data);
        exit();
    }


    function storeCustomer($customerInput){

        global $conn;

        $name = mysqli_real_escape_string($conn, $customerInput['name']);
       

        if(empty(trim($name))){

            return error422("Enter Your Name");

            
        }else {
            $query = "INSERT INTO customers (name) VALUES ('$name')";
            $res = mysqli_query($conn, $query);

            if($res){

                $data = [

                    'status' => 201,
                    'message' => 'Customer Created Successfully'
            
                ];
                
                header("HTTP/1.0 201 Created");
                return json_encode($data, JSON_PRETTY_PRINT);

            }else {

                $data = [

                    'status' => 500,
                    'message' => 'Internal Server Error'
            
                ];
                
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
                
            }
        }

    }

    function updateCustomer($customerInput, $customerParams){

        global $conn;

        
        if(!isset($customerParams['id'])){
            
            return error422("Customer Id not found in the url");
            
        }elseif ($customerParams['id'] == null) {
            
            return error422("Enter customer Id");
            
        }

        
        $customerId = mysqli_real_escape_string($conn, $customerParams['id']);

        $name = mysqli_real_escape_string($conn, $customerInput['name']);

        if(empty(trim($name))){

            return error422("Enter Your Name");

            
        }else {
            $query = "UPDATE customers SET name='$name' WHERE id='$customerId' LIMIT 1 ";
            $res = mysqli_query($conn, $query);

            if($res){

                $data = [

                    'status' => 200,
                    'message' => 'Customer Updated Successfully'
            
                ];
                
                header("HTTP/1.0 200 Success");
                return json_encode($data, JSON_PRETTY_PRINT);

            }else {

                $data = [

                    'status' => 500,
                    'message' => 'Internal Server Error'
            
                ];
                
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
                
            }
        }
    }

function deleteCustomer($customerParams){

    global $conn;

        
        if(!isset($customerParams['id'])){
            
            return error422("Customer Id not found in the url");
            
        }elseif ($customerParams['id'] == null) {
            
            return error422("Enter customer Id");
            
        }

        
        $customerId = mysqli_real_escape_string($conn, $customerParams['id']);

        $query = "DELETE FROM customers  WHERE id='$customerId' LIMIT 1 ";
            $res = mysqli_query($conn, $query);

            if($res){

                $data = [

                    'status' => 200,
                    'message' => 'Customer Deleted Successfully'
            
                ];
                
                header("HTTP/1.0 200 Ok");
                return json_encode($data, JSON_PRETTY_PRINT);

            }else {

                $data = [

                    'status' => 404,
                    'message' => 'Customer not found'
            
                ];
                
                header("HTTP/1.0 404 Not Found");
                return json_encode($data);
                
            }

}

?>
