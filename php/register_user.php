<?php 
// add new member
if (isset($_POST['submit-reg-btn'])) {
	require 'config.php';
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$group_name = mysqli_real_escape_string($conn,$_POST['group-name']);
	$group_location = mysqli_real_escape_string($conn,$_POST['group-location']);
	$group_leader = mysqli_real_escape_string($conn,$_POST['group-leader']);
	$phone_number = mysqli_real_escape_string($conn,$_POST['phone-number']);
	$members_count = mysqli_real_escape_string($conn,$_POST['members-count']);
	$bank_account = mysqli_real_escape_string($conn,$_POST['bank-account']);
	$id_upload = mysqli_real_escape_string($conn,$_FILES['id-upload']['name']);
	$file = rand(30000,40000).".jpg";
	$target = "ids/".$file;
	$check = $conn->query("SELECT * FROM members WHERE EmailAddress='$email'");
	if ($check->num_rows>0) {
		echo "<script>alert('Member already Registered')</script>";
		
	}else{
		if (move_uploaded_file($_FILES['id-upload']['tmp_name'], $target)) {
			$register = $conn->query("INSERT INTO members (GroupName,GroupLocation,GroupLeaderName,GroupLeaderPhoneNumber,EmailAddress,NumberOfMembers,BankAccount,UploadIDCopyPath) VALUES('$group_name', '$group_location','$group_leader','$phone_number','$email','$members_count','$bank_account','$file')");
			if ($register) {
				echo "<script>alert('Registration was successful');window.location.assign('#membership')</script>";
			}
		}else{
			echo "<script>alert('Failed to move the file')</script>";
		}
		
		
	}
}

//contact us
if (isset($_POST['contact-btn'])) {
	require 'config.php';
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$contact_email = mysqli_real_escape_string($conn,$_POST['contact-email']);
	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);
	$register = $conn->query("INSERT INTO contacts (name,contact_email,subject,message) VALUES('$name', '$contact_email','$subject','$message')");
			if ($register) {
				echo "<script>alert('Feedback  was Sent successfully')</script>";
			}else{
				echo "<script>alert('Feedback  was Sent successfully');window.location.assign('#contact')</script>";
			}
}

function displayAllMembers(){
  
require '../php/config.php';
$numbering = 1;
$select = $conn->query("SELECT * FROM members  ORDER BY id DESC");
if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
        echo '
        <tr >
            <td>'.$numbering++.'</td>
            <td>'.$row["GroupName"].'</td>
            <td>'.$row['GroupLocation'].'</td>
            <td>'.$row['GroupLeaderName'].'</td>
            <td>'.$row['GroupLeaderPhoneNumber'].'</td>
            <td>'.$row['EmailAddress'].'</td>
            <td>'.$row['NumberOfMembers'].'</td>
            <td>'.$row['BankAccount'].'</td>
            <td><a href="../ids/'.$row['UploadIDCopyPath'].'" target="_blank">IDCopy</a></td>
            <td><button class="btn btn-sm btn-info">Edit</button> <button class="btn btn-sm btn-danger">Delete</button></td>
           
        </tr>';
}
}


}
function displayAllContacts(){
  
require '../php/config.php';
$numbering = 1;
$select = $conn->query("SELECT * FROM contacts  ORDER BY id DESC");
if ($select->num_rows>0) {
    while ($row=$select->fetch_assoc()) {
        echo '
        <tr >
            <td>'.$numbering++.'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row['contact_email'].'</td>
            <td>'.$row['subject'].'</td>
            <td>'.$row['message'].'</td>
            <td><button class="btn btn-sm btn-info">Edit</button> <button class="btn btn-sm btn-danger">Delete</button></td>
           
        </tr>';
}
}


}




 ?>