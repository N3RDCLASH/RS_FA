SELECT 
    deelnemers_naam, projecten.naam AS project, status
FROM
    deelnemers,
    projecten,
    taken,
    deelnemers_per_taak
WHERE
    projecten.project_id = taken.project_id
        AND taken.taak_id = deelnemers_per_taak.taak_id
        AND deelnemers_per_taak.deelnemers_id = deelnemers.deelnemers_id
        AND deelnemers_naam = 'Sabrina Starke'