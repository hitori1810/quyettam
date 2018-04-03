<?php
$sql = "SELECT DISTINCT
IFNULL(j_gradebookdetail.id, '') primaryid,
IFNULL(l2.id, '') gradebook_id,
l2.type gradebook_type,
l2.minitest minitest,
IFNULL(l3.id, '') class_id,
IFNULL(l1.id, '') student_id,
IFNULL(j_gradebookdetail.certificate_level, '') certificate_level,
IFNULL(j_gradebookdetail.certificate_type, '') certificate_type
FROM
j_gradebookdetail
INNER JOIN
contacts l1 ON j_gradebookdetail.student_id = l1.id
AND l1.deleted = 0
INNER JOIN
j_gradebook l2 ON j_gradebookdetail.gradebook_id = l2.id
AND l2.deleted = 0
INNER JOIN
j_class_j_gradebook_1_c l3_1 ON l2.id = l3_1.j_class_j_gradebook_1j_gradebook_idb
AND l3_1.deleted = 0
INNER JOIN
j_class l3 ON l3.id = l3_1.j_class_j_gradebook_1j_class_ida
AND l3.deleted = 0
WHERE
(((l1.id = '7c2f9583-cf63-18a0-7f0d-5a3705bbfa52')
AND (l3.id = '91721e7b-933b-cc79-9c3b-5a961d4e8cc9')
AND (l2.status = 'Not Approval')))
AND j_gradebookdetail.deleted = 0
ORDER BY CASE WHEN
(gradebook_type = '' OR gradebook_type IS NULL) THEN 0
WHEN gradebook_type = 'Progress' THEN 1
WHEN gradebook_type = 'Commitment' THEN 2
WHEN gradebook_type = 'Overall' THEN 3
ELSE 4
END ASC,
CASE WHEN
(minitest = '' OR minitest IS NULL) THEN 0
WHEN minitest = 'minitest1' THEN 1
WHEN minitest = 'minitest2' THEN 2
WHEN minitest = 'minitest3' THEN 3
WHEN minitest = 'minitest4' THEN 4
WHEN minitest = 'minitest5' THEN 5
WHEN minitest = 'minitest6' THEN 6
WHEN minitest = 'project1' THEN 7
WHEN minitest = 'project2' THEN 8
WHEN minitest = 'project3' THEN 9
WHEN minitest = 'project4' THEN 10
WHEN minitest = 'project5' THEN 11
WHEN minitest = 'project6' THEN 12
ELSE 13
END ASC";
//return array($sql);
$result = $GLOBALS['db']->query($sql);
$data = array();
while($row = $GLOBALS['db']->fetchByAssoc($result)){
    $focus = BeanFactory::getBean('J_Gradebook', $row['gradebook_id']);
    $data[] = $focus->getDetailForStudent($row['student_id']);
}
var_dump($data);    

