<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
                        
                        <?php 
                        date_default_timezone_set('Asia/Singapore');
                        $date = date("l F j, Y, g:i a");
                                //date(DATE_COOKIE);
                        $username = $this->session->userdata('login');
                        //print_r($username);
                        foreach($info as $row):
                            $fname = $row->firstname;
                        ?>
                            
                        <p>Welcome <?php echo anchor('/individual/profile/', ucwords($fname)); ?> <?php echo $date; ?></p>
                            <?php endforeach;?>
                        
                        <table>
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
                <td width="10%"><?php echo ucwords($row->firstname);?></td>
                <td width="10%"><?php echo ucwords($row->lastname);?></td>
                <td width="10%"><?php echo $row->date_of_birth ?></td>
                <td width="15%"><?php echo $row->drivers_license ?></td>
                <td width="10%"><?php echo ucwords($row->state);?></td>
                <td width="15%"><?php echo $row->email ?></td>
                <td width="10%"><?php echo $row->status ?></td>                                    
                <td width="20%"><?php echo ucwords($row->remarks) ?></td>
            </tr>
 <?php
  endforeach;
?>  
                            </tbody>
                        </table>
                      
   