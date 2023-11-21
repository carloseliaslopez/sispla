
DELIMITER $$
CREATE PROCEDURE Busqueda_coincidencia(IN nombre VARCHAR(255))
BEGIN
SELECT fullName_E AS 'fullname', origen FROM ofac_list_en where match ( fullName_E ) against ( nombre IN NATURAL LANGUAGE MODE) 
UNION ALL
SELECT fullName_I AS 'fullname', origen FROM ofac_list_IN where match ( fullName_I ) against ( nombre IN NATURAL LANGUAGE MODE)
union all
SELECT fullName_E AS 'fullname', origen FROM onu_list_en where match ( fullName_E ) against ( nombre IN NATURAL LANGUAGE MODE)
UNION ALL
SELECT fullName_I AS 'fullname', origen FROM onu_list_in where match ( fullName_I ) against ( nombre IN NATURAL LANGUAGE MODE);

END$$





select * from vw_consolidate_name;