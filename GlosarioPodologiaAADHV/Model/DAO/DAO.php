<?php

/**
 *
 * @author Cheloz
 */
 interface DAO {
    
    public function create(Object $param);
    public function read();
    public function update(Object $param);
    public function delete(Object $param);

}
