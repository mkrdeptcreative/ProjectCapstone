<?php
$connect = mysqli_connect("localhost", "root", "krdept12", "m6project");
$output = '';
$sql = "SELECT * FROM jobs ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$output .= '
      <div class="table-responsive">
           <table class="table table-bordered">
                <tr>
                     <th width="5%">Id</th>
                     <th width="15%">JobTitle</th>
                     <th width="10%">Salary</th>
					 <th width="15%">JobDescription</th>
					 <th width="15%">Location</th>
					 <th width="10%">Qualification</th>
					 <th width="15%">Employer</th>
					 <th width="15%">Website</th>                     
                     <th width="5%">Delete</th>                     
                </tr>';
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                <tr>
                     <td>'.$row["id"].'</td>
                     <td class="Title" data-id1="'.$row["id"].'" contenteditable>'.$row["Title"].'</td>
                     <td class="Salary" data-id2="'.$row["id"].'" contenteditable>'.$row["Salary"].'</td>
					  <td class="Job_Description" data-id3="'.$row["id"].'" contenteditable>'.$row["Job_Description"].'</td>
					   <td class="Location" data-id4="'.$row["id"].'" contenteditable>'.$row["Location"].'</td>
					    <td class="Qualifications" data-id5="'.$row["id"].'" contenteditable>'.$row["Qualifications"].'</td>
						 <td class="Employer" data-id6="'.$row["id"].'" contenteditable>'.$row["Employer"].'</td>
						  <td class="website" data-id7="'.$row["id"].'" contenteditable>'.$row["website"].'</td>
                     
                     <td><button type="button" name="delete_btn" data-id8="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Clear</button></td>
                     
                     
                </tr>
           ';
    }
}
    
    

else
{
    $output .= '<tr>
                          <td colspan="4">Data not Found</td>
                     </tr>';
}
$output .= '</table>
      </div>';
echo $output;
?>