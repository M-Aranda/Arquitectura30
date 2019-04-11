<?php

/**
 *
 * @author Cheloz
 */
 interface DAO {
    
    public function create($objeto);
    public function read();
    public function update($objeto);
    public function delete($objeto);

 }
