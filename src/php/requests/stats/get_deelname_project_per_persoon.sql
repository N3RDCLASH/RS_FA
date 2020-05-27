SELECT
  deelnemers_naam,
  project.type,
  projecten.naam AS project,
  STATUS
FROM deelnemers,
  projecten,
  taken,
  deelnemers_per_taak
WHERE
  projecten.project_id = taken.project_id
  AND taken.taak_id = deelnemers_per_taak.taak_id
  AND deelnemers_per_taak.deelnemers_id = deelnemers.deelnemers_id
  AND deelnemers.deelnemers_id =
GROUP BY
  project