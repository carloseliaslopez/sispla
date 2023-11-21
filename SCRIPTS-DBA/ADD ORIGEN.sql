UPDATE global_risk_lists.ofac_list_en
SET origen = "OFAC_SDN"
WHERE origen IS NULL;

UPDATE global_risk_lists.ofac_list_in
SET origen = "OFAC_SDN"
WHERE origen IS NULL;

UPDATE global_risk_lists.onu_list_en
SET origen = "ONU_CONSOLIDATED_lIST"
WHERE origen IS NULL;

UPDATE global_risk_lists.onu_list_in
SET origen = "ONU_CONSOLIDATED_lIST"
WHERE origen IS NULL;