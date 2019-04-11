<?php

/**
 *
 * @author Cheloz
 */
 interface DAO  {
    
    public function create($param);
    public function read();
    public function update($param);
    public function delete($param);

}
