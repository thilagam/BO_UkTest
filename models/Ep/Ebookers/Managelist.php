<?php

class Ep_Ebookers_Managelist extends Ep_Db_Identifier
{
    protected $_name = 'EB_themes';
    //one function to insert in  EB_category,EB_sampletext, EB_themes, EB_token table//
    public function updateManagelist($data){
        //if con. to insert in themes table
        if($data['submit'] == 'themes_submit') {
            $this->_name = 'EB_themes';
            $insertdata['theme_name'] = utf8_decode($data['theme_name']);
            $insertdata['created_at'] = date('Y-m-d H:i:s');
            $last_insert_id = $this->insertQuery($insertdata);
            for($i = 0;$i < $data['theme_no'];$i++) {
                $this->_name = 'EB_language';
                $insertLangData['themes_id'] = $last_insert_id;
                $insertLangData['language'] = $data['langauge'][$i];
                $insertLangData['title'] = utf8_decode($data['description'][$i]);
                $insertLangData['title_condition'] = utf8_decode($data['title_condition'][$i]);
                $insertLangData['created_at'] = date('Y-m-d H:i:s');
                $this->insertQuery($insertLangData);//directly sending the requet array->$data to avoid using variables
            }
        }
        //to insert in category table
        elseif($data['submit'] == 'category_submit') {
            $this->_name = 'EB_category';
            $insertdata['category_name'] = utf8_decode($data['category_name']);
            $insertdata['description'] = utf8_decode($data['description']);
            $insertdata['created_at'] = date('Y-m-d H:i:s');
            $last_insert_id = '';
            if(is_array($data['themes_id'])){
                $j=0;
                while($data['themes_id'][$j]){
                    $insertdata['themes_id'] = $data['themes_id'][$j];
                    $last_insert_id = $this->insertQuery($insertdata);
                    $j++;
                }
            }
            for($i = 0;$i < $data['category_no'];$i++) {
                $this->_name = 'EB_categorized_tokens_conditions';
                $insertLangData['CT_id'] = $last_insert_id;
                $insertLangData['CT_language'] = $data['category_langauge'][$i];
                $insertLangData['CT_title'] = utf8_decode($data['CT_description'][$i]);
                $insertLangData['CT_title_condition'] = utf8_decode($data['CT_title_condition'][$i]);
                $insertLangData['created_at'] = date('Y-m-d H:i:s');
                $this->insertQuery($insertLangData);//directly sending the requet array->$data to avoid using variables
            }
        }
        elseif($data['submit'] == 'tokens_submit') {
            $this->_name = 'EB_token';
            for($i=0;$i<$data['no_tokens'];$i++){
                $insertdata['category_id'] = $data['category_id'];
                $insertdata['token_name'] =utf8_decode($data['token_name_'.$i]);
                $insertdata['token_code'] =utf8_decode($data['token_code_'.$i]);
                $insertdata['description'] =utf8_decode($data['description_'.$i]);
                $insertdata['token_type'] = $data['token_type_'.$i];
                $insertdata['created_at'] = date('Y-m-d H:i:s');
                if(is_array($data['category_id'])){
                    $j=0;
                    while($data['category_id'][$j]){
                        $insertdata['category_id'] = $data['category_id'][$j];
                        $this->insertQuery($insertdata);
                        $j++;
                    }
                }
            }
        }
        elseif($data['submit'] == 'sample_text_submit') {
            $this->_name = 'EB_sampletext';
            unset($data['submit']);//delete the unwanted array before insertation
            unset($data['themes_id']);//delete the unwanted array before insertation
            for($i=0;$i<$data['no_sample_text'];$i++){
                $insertdata['description'] = utf8_decode($data['description_'.$i]);
                $insertdata['created_at'] = date('Y-m-d H:i:s');
                $insertdata['language'] = $data['language'];
                if(is_array($data['token_id'])){
                    $j=0;
                    while($data['token_id'][$j]){
                        $insertdata['token_id'] = $data['token_id'][$j];
                        $this->insertQuery($insertdata);
                        $j++;
                    }
                }
            }
        }
        print_r($data);
    }
    public function loadManageList(){
        $query = "SELECT token. * ,cat.`themes_id`,  cat.`category_name` ,themes.`theme_name`,
                @curRow := @curRow +1 AS sl_no
                FROM `EB_token` AS token
                LEFT JOIN `EB_category` AS cat ON token.`category_id` = cat.`cat_id`
                LEFT JOIN `EB_themes` AS themes ON cat.`themes_id` = themes.`theme_id`
                JOIN (

                SELECT @curRow :=0
                )r
                WHERE token.`status` = 'active'
                ORDER BY themes.`theme_id`,cat.`cat_id` ";//used "@curRow :=0" for an extra row as SL.NO
        if (($result = $this->getQuery($query, true)) != NULL) {
            $i = 0;
            while($result[$i]){
                $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                $result[$i]['token_code'] = utf8_encode($result[$i]['token_code']);;
                $result[$i]['token_name'] = utf8_encode($result[$i]['token_name']);
                $result[$i]['description'] = utf8_encode($result[$i]['description']);
                $i++;
            }
            return $result;
        }
        else
            return false;
    }
    // to load the all the List of themes and display in the datatable//
    public function loadThemes(){
        $query = "SELECT *,@curRow := @curRow + 1 AS sl_no FROM `EB_themes`
            JOIN    (SELECT @curRow := 0) r
             WHERE `status` = 'active' ";//used "@curRow :=0" for an extra row as SL.NO
        if (($result = $this->getQuery($query, true)) != NULL) {
            $i = 0;
            while($result[$i]){
                $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                $result[$i]['description'] = utf8_encode($result[$i]['description']);
                $i++;
            }
            return $result;
        }
        else
            return false;
    }
    // to load the all the List of category and display in the datatable//
    public function loadCategory(){
        $query = "SELECT cat . * , theme.`theme_name` , @curRow := @curRow +1 AS sl_no
                FROM `EB_category` AS cat
                LEFT JOIN `EB_themes` AS theme ON cat.`themes_id` = theme.`theme_id`
                JOIN (
                  SELECT @curRow :=0
                )r
                WHERE cat.`status` = 'active'";//used "@curRow :=0" for an extra row as SL.NO
        if (($result = $this->getQuery($query, true)) != NULL) {
            $i = 0;
            while($result[$i]){
                $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                $result[$i]['description'] = utf8_encode($result[$i]['description']);
                $i++;
            }
            return $result;
        }
        else
            return false;
    }
    // to load the all the List of tokens and display in the datatable//
    public function loadTokens(){
        $query = "SELECT token. * ,cat.`themes_id`,  cat.`category_name` ,themes.`theme_name`,
                @curRow := @curRow +1 AS sl_no
                FROM `EB_token` AS token
                LEFT JOIN `EB_category` AS cat ON token.`category_id` = cat.`cat_id`
                LEFT JOIN `EB_themes` AS themes ON cat.`themes_id` = themes.`theme_id`
                JOIN (

                SELECT @curRow :=0
                )r
                WHERE token.`status` = 'active'";//used "@curRow :=0" for an extra row as SL.NO
        if (($result = $this->getQuery($query, true)) != NULL) {
            $i = 0;
            while($result[$i]){
                $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                $result[$i]['token_code'] = utf8_encode($result[$i]['token_code']);;
                $result[$i]['token_name'] = $this->truncate(utf8_encode($result[$i]['token_name']));
                $result[$i]['description'] = utf8_encode($result[$i]['description']);
                $i++;
            }
            return $result;
        }
        else
            return false;
    }
    public function truncate($text) {
        if(strlen($text) >=25 ){
            $arr = str_split($text, 25);
            $res='';
            for($i=0;$i<count($arr)-1;$i++)
                $res .= $arr[$i]."<span style='color:#FF0000;'>-</span> ";
            $res .= $arr[count($arr)-1];
            return $res;
        }
        else
            return $text;
    }
    // to load the all the List of sample_text and display in the datatable//
    public function loadSampletext(){
        $query = "SELECT sampletext. * , token.`token_name` ,cat.`category_name`,themes.`theme_name`,
                @curRow := @curRow +1 AS sl_no
                FROM `EB_sampletext` AS sampletext
                LEFT JOIN `EB_token` AS token ON sampletext.`token_id` = token.`token_id`
                LEFT JOIN `EB_category` AS cat ON cat.`cat_id` = token.`category_id`
                LEFT JOIN `EB_themes` AS themes ON cat.`themes_id` = themes.`theme_id`
                JOIN (

                SELECT @curRow :=0
                )r
                WHERE sampletext.`status` = 'active' ";//used "@curRow :=0" for an extra row as SL.NO
        if (($result = $this->getQuery($query, true)) != NULL) {
            $i = 0;
            while($result[$i]){
                $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                $result[$i]['description'] = utf8_encode($result[$i]['description']);
                $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                $i++;
            }
            return $result;
        }
        else
            return false;
    }
    //to chanage the status from active to delete in  EB_category,EB_sampletext, EB_themes, EB_token table//
    public function deleteList($data){
        if($data['type'] == 'themes') {
            $this->_name = 'EB_themes';
            $where = " theme_id='" . $data['id'] . "' ";
            $deletedata['status'] = 'deleted';
        }
        //to delete in category table
        elseif($data['type'] == 'category') {
            $this->_name = 'EB_category';
            $where = " cat_id='" . $data['id'] . "' ";
            $deletedata['status'] = 'deleted';
        }
        elseif($data['type'] == 'tokens') {
            $this->_name = 'EB_token';
            $where = " token_id='" . $data['id'] . "' ";
            $deletedata['status'] = 'deleted';
        }
        elseif($data['type'] == 'sample_text') {
            $this->_name = 'EB_sampletext';
            $where = " sample_id='" . $data['id'] . "' ";
            $deletedata['status'] = 'deleted';
        }
        $this->updateQuery($deletedata, $where);
        print_r($data);
    }
    //to fetch data from  EB_category,EB_sampletext, EB_themes, EB_token table and display into a form for editing//
    public function viewEditList($data){
        if($data['type'] == 'themes') {
            $query = "SELECT count(themes.`theme_id`) AS count
                      FROM `EB_themes` AS themes
                      LEFT JOIN `EB_language` as lang ON  themes.`theme_id` = lang.`themes_id`
                      WHERE
                      themes.`theme_id` = '".$data['id']."'
                      AND
                      lang.`status` = 'active'";
           if (($result = $this->getQuery($query, true)) != NULL) {
                if($result[0]['count'] > 0){
                    $query = "SELECT themes.`theme_id`,themes.`theme_name`,
                              lang.`language_id`, lang.`language`,lang.`title` as lang_desc,lang.`title_condition`
                              FROM `EB_themes` AS themes
                              LEFT JOIN `EB_language` as lang ON  themes.`theme_id` = lang.`themes_id`
                              WHERE
                              themes.`theme_id` = '" . $data['id'] . "'
                              AND
                              lang.`status` = 'active'";
                    if (($result = $this->getQuery($query, true)) != NULL) {
                        $i = 0;
                        while ($result[$i]) {
                            $result[$i]['type'] = $data['type'];
                            $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                            $result[$i]['language'] = utf8_encode($result[$i]['language']);
                            $result[$i]['lang_desc'] = utf8_encode($result[$i]['lang_desc']);
                            $result[$i]['title_condition'] = utf8_encode($result[$i]['title_condition']);
                            $i++;
                        }
                        return $result;
                    } else
                        return false;
                }
                else{
                    $query = "SELECT themes.`theme_id`,themes.`theme_name`,
                               'new' AS language_id,'' AS language,'' AS lang_desc,'' AS title_condition
                              FROM `EB_themes` AS themes
                              WHERE
                              themes.`theme_id` = '" . $data['id'] . "'
                              ";
                    if (($result = $this->getQuery($query, true)) != NULL) {
                        $i = 0;
                        while ($result[$i]) {
                            $result[$i]['type'] = $data['type'];
                            $result[$i]['theme_name'] = utf8_encode($result[$i]['theme_name']);
                            $result[$i]['language'] = utf8_encode($result[$i]['language']);
                            $result[$i]['lang_desc'] = utf8_encode($result[$i]['lang_desc']);
                            $result[$i]['title_condition'] = utf8_encode($result[$i]['title_condition']);
                            $i++;
                        }
                        return $result;
                    } else
                        return false;
                }
            }
        }
        elseif($data['type'] == 'category') {
                $query = "SELECT count(cat.`cat_id`) AS count
                    FROM `EB_category` AS cat
                    LEFT JOIN `EB_themes` AS theme ON cat.`themes_id` = theme.`theme_id`
                    LEFT JOIN `EB_categorized_tokens_conditions` AS CT ON CT.CT_id = cat.cat_id
                    WHERE
                    cat.`cat_id` = '".$data['id']."'
                    AND
                    CT.`status` = 'active'";
            if (($result = $this->getQuery($query, true)) != NULL) {
                if($result[0]['count'] > 0){
                    $query = "SELECT cat.* , theme.`theme_name`,CT.CT_language_id,CT.CT_language,CT.CT_title,CT.CT_title_condition
                            FROM `EB_category` AS cat
                            LEFT JOIN `EB_themes` AS theme ON cat.`themes_id` = theme.`theme_id`
                            LEFT JOIN `EB_categorized_tokens_conditions` AS CT ON CT.CT_id = cat.cat_id
                            WHERE
                            cat.`cat_id` = '".$data['id']."'
                              AND
                              CT.`status` = 'active'";
                    if (($result = $this->getQuery($query, true)) != NULL) {
                        $i = 0;
                        while ($result[$i]) {
                            $result[$i]['type'] = $data['type'];
                            $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                            $result[$i]['description'] = utf8_encode($result[$i]['description']);
                            $result[$i]['CT_title'] = utf8_encode($result[$i]['CT_title']);
                            $result[$i]['CT_title_condition'] = utf8_encode($result[$i]['CT_title_condition']);
                            $i++;
                        }
                        return $result;
                    } else
                        return false;
                }
                else{
                    $query = "SELECT cat.* , theme.`theme_name`
                        FROM `EB_category` AS cat
                        LEFT JOIN `EB_themes` AS theme ON cat.`themes_id` = theme.`theme_id`
                        WHERE
                        cat.`cat_id` = '".$data['id']."' ";
                    if (($result = $this->getQuery($query, true)) != NULL) {
                        $i = 0;
                        while ($result[$i]) {
                            $result[$i]['type'] = $data['type'];
                            $result[$i]['category_name'] = utf8_encode($result[$i]['category_name']);
                            $result[$i]['description'] = utf8_encode($result[$i]['description']);
                            $result[$i]['CT_title'] = utf8_encode($result[$i]['CT_title']);
                            $result[$i]['CT_title_condition'] = utf8_encode($result[$i]['CT_title_condition']);
                            $i++;
                        }
                        return $result;
                    } else
                        return false;
                }
            }
        }
        // this will display edit form for tokens//
        elseif($data['type'] == 'tokens') {
            $query = "SELECT token.* , cat.`category_name`, cat.`themes_id`
                FROM `EB_token` AS token
                LEFT JOIN `EB_category` AS cat ON token.`category_id` = cat.`cat_id`
                WHERE
                token.`token_id` = '".$data['id']."' ";
            if (($result = $this->getQuery($query, true)) != NULL) {
                $i = 0;
                while($result[$i]){
                    $result[$i]['type'] = $data['type'];
                    $result[$i]['token_name'] = utf8_encode($result[$i]['token_name']);
                    $result[$i]['token_code'] = utf8_encode($result[$i]['token_code']);
                    $result[$i]['description'] = utf8_encode($result[$i]['description']);
                    $i++;
                }
                return $result;
            }
            else
                return false;
        }
        elseif($data['type'] == 'sample_text') {
            $query = "SELECT sampletext.* ,token.`token_name`, cat.`category_name`, cat.`themes_id`,cat.`cat_id`,themes.`theme_name`,token.`category_id`
                FROM `EB_sampletext` AS sampletext
                LEFT JOIN `EB_token` AS token ON sampletext.`token_id` = token.`token_id`
                LEFT JOIN `EB_category` AS cat ON cat.`cat_id` = token.`category_id`
                LEFT JOIN `EB_themes` AS themes ON cat.`themes_id` = themes.`theme_id`
                WHERE
                sampletext.`sample_id` = '".$data['id']."' ";
            if (($result = $this->getQuery($query, true)) != NULL) {
                $i = 0;
                while($result[$i]){
                    $result[$i]['type'] = $data['type'];
                    $result[$i]['description'] = utf8_encode($result[$i]['description']);
                    $i++;
                }
                return $result;
            }
            else
                return false;
        }
    }
    //to edit/update data in  EB_category,EB_sampletext, EB_themes, EB_token//
    public function editManagelist($data){
        if($data['type'] == 'themes') {
            $this->_name = 'EB_themes';
            $where = " theme_id='" . $data['id'] . "' ";
            $editdata['theme_name'] = utf8_decode($data['theme_name']);
            $editdata['updated_at'] = date('Y-m-d H:i:s');
        }
        elseif($data['type'] == 'themes_language') {
            $this->_name = 'EB_language';
            if( $data['id'] === 'new'){
                $insertLangData['themes_id'] = $data['theme_id'];
                $insertLangData['language'] =  utf8_decode($data['language']) ;
                $insertLangData['title'] =  utf8_decode($data['description']) ;
                $insertLangData['title_condition'] =  utf8_decode($data['title_condition']) ;
                $insertLangData['created_at'] = date('Y-m-d H:i:s');
                $this->insertQuery($insertLangData);//directly sending the requet array->$data to avoid using variables
                exit;//exit after inserting to avoid furthure updatation.

            }
            else{

                $where = " language_id='" . $data['id'] . "' ";
                $editdata['language'] = utf8_decode($data['language']) ;
                $editdata['title'] = utf8_decode($data['description']) ;
                $editdata['title_condition'] = utf8_decode($data['title_condition']) ;
                $editdata['updated_at'] = date('Y-m-d H:i:s');
            }
        }
        //to delete in category table
        elseif($data['type'] == 'category') {
            $this->_name = 'EB_category';
            $where = " cat_id='" . $data['id'] . "' ";
            $editdata['themes_id'] = utf8_decode($data['themes_id']) ;
            $editdata['category_name'] = utf8_decode($data['category_name']) ;
            $editdata['description'] = utf8_decode($data['description']) ;
            $editdata['updated_at'] = date('Y-m-d H:i:s');


        }
        /* *** added on 16.12.2015 *** */
        elseif($data['type'] == 'category_language') {
            $this->_name = 'EB_categorized_tokens_conditions';
            if( $data['id'] === 'new' || $data['id'] === '' ){
                $insertLangData['CT_id'] = $data['cat_id'];
                $insertLangData['CT_language'] =  utf8_decode($data['language']) ;
                $insertLangData['CT_title'] =  utf8_decode($data['description']) ;
                $insertLangData['CT_title_condition'] =  utf8_decode($data['title_condition']) ;
                $insertLangData['created_at'] = date('Y-m-d H:i:s');
                $this->insertQuery($insertLangData);//directly sending the requet array->$data to avoid using variables
                exit;//exit after inserting to avoid furthure updatation.

            }
            else{

                $where = " CT_language_id='" . $data['id'] . "' ";
                $editdata['CT_language'] = utf8_decode($data['language']) ;
                $editdata['CT_title'] = utf8_decode($data['description']) ;
                $editdata['CT_title_condition'] = utf8_decode($data['title_condition']) ;
                $editdata['updated_at'] = date('Y-m-d H:i:s');
            }
        }

        elseif($data['type'] == 'tokens') {
            $this->_name = 'EB_token';
            $where = " token_id='" . $data['id'] . "' ";
            //$editdata['themes_id'] = utf8_decode($data['themes_id']) ;
            $editdata['category_id'] = utf8_decode($data['category_id']) ;
            $editdata['token_name'] = utf8_decode($data['token_name']) ;
            $editdata['token_code'] = utf8_decode($data['token_code']) ;
            $editdata['description'] = utf8_decode($data['description']) ;
            $editdata['token_type'] = $data['token_type'];
            $editdata['updated_at'] = date('Y-m-d H:i:s');
        }
        elseif($data['type'] == 'sample_text') {
            $this->_name = 'EB_sampletext';
            $where = " sample_id='" . $data['id'] . "' ";
            //$editdata['themes_id'] = utf8_decode($data['themes_id']) ;
            $editdata['token_id'] = utf8_decode($data['token_id']) ;
            $editdata['description'] = utf8_decode($data['description']) ;
            $editdata['language'] = utf8_decode($data['language']) ;
            $editdata['updated_at'] = date('Y-m-d H:i:s');
        }
        $this->updateQuery($editdata, $where);
        print_r($editdata);
    }
    public function loadThemesEditOption(){
        $query = "SELECT `theme_id`,`theme_name` FROM `EB_themes` WHERE `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }
    public function loadCategoryEdit2Option($data){
        $query = "SELECT `cat_id`,`category_name` FROM `EB_category` WHERE `themes_id` = '".$data[0]['themes_id']."' AND `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }
    public function loadTokensEditOption($data){
        $cat_id = (isset($data[0]['cat_id']) && $data[0]['cat_id'] != '') ? $data[0]['cat_id'] :$data['cat_id'];
        $query = "SELECT `token_id`,`token_name` FROM `EB_token` WHERE `category_id` = '".$cat_id."' AND `status` = 'active' AND `token_type` = 'mandatory'";
        if (($result = $this->getQuery($query, true)) != NULL){

            return $result;
        }
        else
            return false;
    }
    //to load theme options using ajax(everytime a new entry is made the theme option has to be updated)//
    public function loadThemesOption($data){
        $query = "SELECT `theme_id`,`theme_name` FROM `EB_themes` WHERE `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){

            return $result;
        }
        else
            return false;
    }
    //to load category options  based on theme selection using ajax(everytime a theme is slecet and csubordinate category option has to be updated)//
    public function loadCategoryOption($data){
        $query = "SELECT `cat_id`,`category_name` FROM `EB_category` WHERE `themes_id` = '".$data['theme_id']."' AND `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }
    public function loadTokensOption($data){
        $cat_id = (isset($data[0]['cat_id']) && $data[0]['cat_id'] != '') ? $data[0]['cat_id'] :$data['cat_id'];
        $query = "SELECT `token_id`,`token_name` FROM `EB_token` WHERE `category_id` = '".$cat_id."' AND `status` = 'active' AND `token_type` = 'mandatory'";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }
    //to load category options  based on theme selection using ajax(only during editing of tokens/sampletext)(everytime a theme is slecet and csubordinate category option has to be updated)//
    /*public function loadCategory2Option($data){
        $query = "SELECT `cat_id`,`category_name` FROM `EB_category` WHERE `themes_id` = '".$data[0]['themes_id']."' AND `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            $options = '<option value="">Select</option>';
            $i=0;
            $category_id = $data[$i]['category_id'];
            while($result[$i]) {
                if($result[$i]['cat_id'] == $category_id)
                    $options .= '<option value="' . $result[$i]['cat_id'] . '" selected>' . utf8_encode($result[$i]['category_name']) . '</option>';
                else
                    $options .= '<option value="' . $result[$i]['cat_id'] . '">' . utf8_encode($result[$i]['category_name']) . '</option>';
                $i++;
            }
            return $options;
        }
        else
            return false;
    }*/
    public function deleteThemeLangauge($data)
    {
        $this->_name = 'EB_language';
        $where = " language_id='" . $data['lang_id'] . "' ";
        $deletedata['status'] = 'deleted';
        $this->updateQuery($deletedata, $where);
        print_r($data);

    }
    /* *** added on 16.12.2015 *** */
    // called as ajax function to delte category laung //
    public function deleteCategoryLangauge($data)
    {
        $this->_name = 'EB_categorized_tokens_conditions';
        $where = " CT_language_id='" . $data['lang_id'] . "' ";
        $deletedata['status'] = 'deleted';
        $this->updateQuery($deletedata, $where);
        print_r($data);

    }
}