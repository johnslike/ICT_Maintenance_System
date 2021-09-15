
<?php

$conn= mysqli_connect("localhost", "root", "123456","ict_maintenance_db");
if (!$conn) {
	exit("Sorry, Connection error..");
}

$val= $_GET["value"];

$val_M = mysqli_real_escape_string($conn, $val);


$sql="SELECT division_name, section_name FROM division_section WHERE division_name='$val_M' ORDER BY section_name ASC";
// $sql="SELECT lib_division.division_name, lib_section.section_name
// FROM lib_division.division_name='$val_M'
// LEFT JOIN lib_section
// ON lib_division.id = lib_section.d_id";
$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
	echo "<div class='form-group'>";
	echo "<select>";
	echo "<option>-- Select section --</option>";
	
	while ($rows= mysqli_fetch_assoc($result)) {
		$section_name = $rows['section_name'];
		
		echo "<option value='".$section_name."'>".$rows['section_name'].'</option>';
	}

	echo "</select>";
	echo "</div>";
	
} else {
	echo "<select>
			<option>-- Select section --</option>
		</select>";
}


?>