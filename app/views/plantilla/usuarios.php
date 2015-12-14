 
<table class="table table-striped">
            			<thead>
            				<tr><!--tabla de tareas-->
            					<td><b>Email</b></td>
            					<td><b>Tipo</b></td>                                               
                                         
                			</tr>
                                    <tbody>
                                    <tr>
                                <?php foreach ($usuarios as $row) : ?>                                      
                                    <tr>
                                    <td> <?php echo $row['email'];?> </td>
                                    <td> <?php if($row['tipo'] == '1')
                                    {
                                        echo 'ADMIN';
                                    }
                                    else
                                    {
                                        echo 'USUARIO';
                                    }
                                 
                                    ?> </td>                                
                                   
                              
                                <?php endforeach; ?> 
                                </tr>
                        
            				</tbody>
            		</table>  

<?php echo '<a href="../../index.php">Volver al inicio</a>';?>
