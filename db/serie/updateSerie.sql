UPDATE `serie` SET Name = ':name', AirDate = ':airdate', LastSeason = ':season',
  LastEpisode = ':episode', color = ':color' WHERE id = :id;
