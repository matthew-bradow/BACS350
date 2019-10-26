<?php

    require_once 'views.php';


    // add_review_form -- Create an HTML form to add record.
    // Fields: designer, url, report, score, date
    function add_review_form() {
        $title = 'Add Review';
        $body = '
            <form action="insert.php" method="get">
                <table class="table table-hover">
                    <tr>
                        <td width="500"><label>Date:</label></td>
                        <td><input type="date" name="date"></td>
                    </tr>
                    <tr>
                        <td><label>Designer:</label></td>
                        <td><input type="text" name="designer"></td>
                    </tr>
                    <tr>
                        <td><label>Page to Review:</label></td>
                        <td><input type="url" name="url"></td>
                    </tr>
                    <tr>
                        <td><label>Review Score:</label></td>
                        <td><input type="number" name="score"></td>
                    </tr>
                    <tr>
                        <td><label>Report:</label></td>
                        <td><textarea name="report"></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="button">Save Review</button></td>
                    </tr>
                </table>
            </form>
            ';
        return render_card($title, $body);
    }


    // Create an HTML list on the output
    function render_reviews($reviews) {
        $html = '';
        foreach($reviews as $row) {
            //$title = $row['title'];
            $delete_href = "delete.php?id=$row[id]";
            $edit_href = "update.php?id=$row[id]";
            $body = "
                <p>Review #$row[id]</p>
                <p>$row[body]</p>
                <table class='table table-hover'>
                    <tr><td>Designer:</td><td>$row[designer]</td></tr>
                    <tr><td>URL:</td><td>$row[url]</td></tr>
                    <tr><td>Date:</td><td>$row[date]</td></tr>
                    <tr><td>Score:</td><td>$row[score]</td></tr>
                    <tr><td>Report:</td><td>$row[report]</td></tr>
                </table>
                <p>
                    <a class='button' href='$edit_href'>Edit</a>
                    <a class='button' href='$delete_href'>Delete</a>
                </p>";
            $html .= render_card($title, $body);
        }
        return $html;
    }


    // Show form for adding a record
    function edit_review_form($record) {
        $id = $record['id'];
        $designer = $record['designer'];
        $url = $record['url'];
        $date = $record['date'];
        $score = $record['score'];
        $report = $record['report'];
        $card_title = "Edit Review";
        $card_body = '
            <form action="update.php" method="post">
                <table class="table table-hover">
                    <tr>
                        <td width="500"><label>Date:</label></td>
                        <td><input type="date" name="date" value="' . $date . '"></td>
                    </tr>
                    <tr>
                        <td><label>Designer:</label></td>
                        <td><input type="text" name="designer" value="' . $designer . '"></td>
                    </tr>
                    <tr>
                        <td><label>Page to Review:</label></td>
                        <td><input type="url" name="url" value="' . $url . '"></td>
                    </tr>
                    <tr>
                        <td><label>Review Score:</label></td>
                        <td><input type="number" name="score" value="' . $score . '"></td>
                    </tr>
                    <tr>
                        <td><label>Report:</label></td>
                        <td><textarea name="report">' . $report . '</textarea></td>
                    </tr>
                    <tr>
                        <td><button class="button">Save Review</button></td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="' . $id . '">
            </form>
        ';
        return render_card($card_title, $card_body);
    }
    
?>
