<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Traits\MyTrait;
use App\Events\MyEvent;

class MyController extends BaseController
{
    use MyTrait;
    public function index()
    {
        $myService = Services::myService();

        $result = $myService->doSomething();

        echo $result;
    }

    public function calculate()
    {
        $calculatorService = Services::calculatorService();

        $numbers = [10, 5, 2];
        $operator = '+';

        $result = $calculatorService->calculate($numbers, $operator);

        echo "Result: $result";
    }

    public function testCache(){

        $cache = \Config\Services::cache();

        //Storing Data in Cache
        $data = 'Mominur Rahman';
        $cache->save('name', $data, 3600);

        $languages = ['Bangla','English','Arabic','Hindi','Tamil'];
        $cache->save('languages', $languages, 3600);

        //Retrieving Data from Cache
        $data = $cache->get('name');
        if ($data !== null) {
            echo $data;
        }

        //Deleting Data from Cache
        $cache->delete('my_key');

        /*
        *
            1. save($key, $data, $ttl = null)
               Stores data in the cache with the given key. The `$data` parameter represents the data to be stored, 
               and `$ttl` (Time To Live) specifies the cache lifetime in seconds.
            
            2. get($key)
               Retrieves the data from the cache associated with the given key. 
               If the data is not found or has expired, it returns `null`.
            
            3. delete($key)
               Deletes the data associated with the given key from the cache.
            
            4. getHandler()
               Returns the cache handler instance being used.
            
            5. remember($key, $ttl, $callback)
               Retrieves the data from the cache associated with the given key. 
               If the data is not found or has expired, it calls the specified callback function, 
               stores the returned data in the cache, and then returns the data.
            
            6. rememberForever($key, $callback)
               Retrieves the data from the cache associated with the given key. If the data 
               is not found or has expired, it calls the specified callback function, 
               stores the returned data in the cache indefinitely, and then returns the data.
            
            7. has($key)
               Checks if the cache contains data associated with the given key.
            
            8. increment($key, $offset = 1)
               Increments the value stored in the cache with the given key by the specified offset. 
               If the value is not found in the cache, it initializes it with zero.
            
            9. decrement($key, $offset = 1)
               Decrements the value stored in the cache with the given key by the specified offset. 
               If the value is not found in the cache, it initializes it with zero.
            
            10. clean()
                Clears all the cached data.
            
            11. cacheDriver()
                Returns the cache driver instance being used.
        */
    }


    public function testTrait(){
      $info = [
         'id'         => 111,
         'ip_address' => $this->request->getIPAddress(),
     ];
     
     log_message('info', 'User {id} logged into the system from {ip_address}', $info);
            echo $this->greet(); 
    }

    public function testHelper(){
        $result = my_helper_function();
        echo $result;
    }


    public function startEvent(){
      MyEvent::myEventTrigger('Event data');
    }


    public function testAny(){
      echo "I'm testing";
      
    }

    public function learnRoute(){
      echo "Hello";
    }


    public function testCURL()
    {
        //$client = \Config\Services::curlrequest();
        $options = [
            'baseURI' => 'http://example.com/api/v1/',
            'timeout' => 3,
        ];
        $client = \Config\Services::curlrequest($options);
    }


}
