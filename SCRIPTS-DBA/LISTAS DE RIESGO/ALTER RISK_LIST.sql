
UPDATE ofac_list_en
SET origen = 'OFAC_SDN'
WHERE
origen IS NULL;


UPDATE ofac_list_in
SET origen = 'OFAC_SDN'
WHERE
    origen IS NULL;
    

UPDATE onu_list_en
SET origen = 'ONU'
WHERE
    origen IS NULL;
    


UPDATE onu_list_in
SET origen = 'ONU'
WHERE
    origen IS NULL;