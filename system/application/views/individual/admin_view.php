<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
                        
                        <?php 
                        $date = date(DATE_COOKIE);
                        $username = $this->session->userdata('login');
                        //print_r($username);
                        foreach($info as $row):
                            $fname = $row->firstname;
                        ?>
                            
                        <p>Welcome <?php echo anchor('/individual/profile/', $fname); ?> <?php echo $date; ?></p>
                            <?php endforeach;?>
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="bordered-table zebra-striped" id="admin">
                            <thead>
                                <tr>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>DOB</th>
                                    <th>License</th>
                                    <th>State</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Remarks</th> 
                                </tr>
                            </thead>
                            <tbody>                           
                                <?php
                                
        foreach (
                
                $info as $row
                ) :?>                 
           <tr>
                <td><?php echo ucwords($row->firstname);?></td>
                <td><?php echo ucwords($row->lastname);?></td>
                <td><?php echo $row->date_of_birth ?></td>
                <td><?php echo $row->drivers_license ?></td>
                <td><?php echo ucwords($row->state);?></td>
                <td><i><?php echo $row->email ?></i></td>
                <td><i><?php echo $row->status ?></i></td>                                    
                <td><?php echo $row->remarks ?></td>
            </tr>
 <?php
  endforeach;
?>  
                            </tbody>
                        </table>
                      
   