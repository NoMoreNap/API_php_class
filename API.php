<?php

class API {
        public $API_URL = 'https://jsonplaceholder.typicode.com';

        public function GET($handle) {
            $ch = curl_init($this->API_URL.$handle);
            curl_setopt($ch,  CURLOPT_HTTPGET, 1);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_HEADER, 0);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        public function POST($handle, $body) {
            $ch = curl_init($this->API_URL.$handle);
            curl_setopt($ch,  CURLOPT_POST, 1);
            curl_setopt($ch,  CURLOPT_POSTFIELDS, http_build_query($body));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_HEADER, 0);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        public function PUT($handle, $body) {
            $ch = curl_init($this->API_URL.$handle);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch,  CURLOPT_POSTFIELDS, http_build_query($body));
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_HEADER, 0);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        public function DELETE($handle, $data = '') {
            $ch = curl_init($this->API_URL.$handle);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_HEADER, 0);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
        // GET methods
        public function get_users() {
            $handle = '/users/';
            echo $this->GET($handle);
        }
        public function get_userPosts($id) {
            $handle = "/users/$id/posts";
            echo $this->GET($handle);
        }
        public function  get_userTodos($id) {
            $handle = "/users/$id/todos";
            echo $this->GET($handle);
        }

        // POST method

        public function create_post($id,$title,$text) {
            $handle = '/posts';
            $body = array('title' => $title,'body' => $text, 'userId' => $id);
            echo $this->POST($handle,$body);
        }
        // PUT
        public function edit_post($post,$id,$title,$text) {
            $handle = "/posts/$id";
            $body = array('title' => $title,'body' => $text, 'userId' => $id, 'postId'=>$post);
            echo $this->PUT($handle,$body);
        }
        //delete
        public function delete_post($post) {
            $handle = "/posts/$post";
            echo $this->DELETE($handle);
        }


}
