BULK INSERT a1209929.a1209929.[Materiales]
   FROM 'e:\wwwroot\rcortese\materiales.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT a1209929.a1209929.[Proyectos]
   FROM 'e:\wwwroot\rcortese\proyectos.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

BULK INSERT a1209929.a1209929.[Proveedores]
   FROM 'e:\wwwroot\rcortese\proveedores.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )

SET DATEFORMAT dmy

BULK INSERT a1209929.a1209929.[Entregan]
   FROM 'e:\wwwroot\rcortese\entregan.csv'
   WITH 
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )