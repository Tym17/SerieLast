SELECT id, Name, AirDate, LastSeason, LastEpisode, Color
  FROM `serie` WHERE serie.Ownerid = :my_id;
